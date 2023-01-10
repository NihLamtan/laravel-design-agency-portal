<?php

namespace App\Http\Controllers;

use App\Mail\OrderAdminEmail;
use App\Mail\OrderEmail;
use App\Mail\UserCreated;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PDF;
use App\Models\Package;

class CheckOutController extends Controller
{
    public function create()
    {
        $slug = request('plan');
        $package = request('package');

        $service = Service::where('slug', $slug)->first();
        $service_package = Package::where('id', $package)->first();
        

        return view('checkout.create', compact('service', 'service_package'));
    }

    public function store(Request $request, $plan_id)
    {
        $service = Service::where('id', $plan_id)->first();
        if (auth()->check()) {
            $user = auth()->user();
        } else {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                Cookie::queue(Cookie::make('checkout_service_slug', $service->slug, 60));

                return back()->with('info', "It seems we have an account with this email address please <a href='/login'>login</a> to continue.");
            } else {
                Cookie::queue(Cookie::forget('checkout_service_slug'));
                request()->validate([
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required',
                ]);
                $password = Str::random(8);
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'city' => $request->city,
                    'state' => $request->state,
                    'postal_code' => $request->postal_code,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'password' => Hash::make($password),
                ]);

                $billing = $user->billing()->create([
                    'city' => $request->city,
                    'postal_code' => $request->postal_code,
                    'address' => $request->address,
                ]);

                // new user email
                Mail::to($user->email)->bcc('admin@logoinusa.com')->send(new UserCreated($user, $password));
                auth()->loginUsingId($user->id);
            }
        }

        try {
            $service = Service::find($plan_id);

            $order = Order::create([
                'customer_id' => $user->id,
                'service_id' => $service->id,
                'order_status' => 'pending',
                'price' => $service->price,
                'amount' => $service->price,
            ]);

            $customer = $order->user->createOrGetStripeCustomer();
            $order->user->addPaymentMethod($request->payment_method);
            $stripeCharge = $order->user->charge($order->price * 100, $request->payment_method);

            $order->update(['payment_status' => $stripeCharge->status]);

            // save invoice
            $invoice_filename = "{$order->order_id}.pdf";
            PDF::loadView('invoice.pdf', ['order' => $order])->save(storage_path("app/invoices/$invoice_filename"));
            $order->invoice()->create([
                'customer_id' => $user->id,
                'filename' => $invoice_filename,
                'invoice_number' => $order->order_number,
              ]);

            $stripeCharge = Payment::create([
                'stripe_id' => $stripeCharge->id,
                'amount' => $stripeCharge->amount / 100,
                'status' => $stripeCharge->status,
                'payment_method' => $stripeCharge->payment_method,
                'currency' => $stripeCharge->currency,
                'customer_id' => $user->id,
                'order_id' => $order->id,
            ]);

            // order email
            Mail::to($user->email)
            ->send(new OrderEmail($order));

            // order email to admin
            Mail::to('saad@gmail.com')
            ->send(new OrderAdminEmail($order));
        } catch (\Stripe\Exception\CardException $e) {
            return back()->with('error', $e->getMessage());
        }

        // return redirect()->route('order.thankyou', $order->id);
    }
}
