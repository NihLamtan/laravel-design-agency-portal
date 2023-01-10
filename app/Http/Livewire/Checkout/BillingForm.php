<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Support\Facades\Cookie;
use App\Mail\OrderAdminEmail;
use App\Mail\OrderEmail;
use App\Mail\UserCreated;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;

class BillingForm extends Component
{
    public $service;

    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $billing_address;
    public $payment_method;

    protected $listeners = ['paymentMethodAdded' => 'updatePaymentMethod'];

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email'
    ];

    public function __construct($service)
    {
        $this->service = $service;
    }
    
    public function mount()
    {
        if(auth()->check()) {
            $user = auth()->user();
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->email = $user->email;
            $this->phone = $user->phone;
    
            $billing = auth()->user()->billing;
            if($billing) {
                $this->billing_address = [
                    'state' => $billing->state,
                    'city' => $billing->city,
                    'postal_code' => $billing->postal_code,
                    'address' => $billing->address,
                ];
            }
        }
    }

    public function render()
    {
        return view('livewire.checkout.billing-form');
    }

    public function submit()
    {
        $service = $this->service;
        if (auth()->check()) {
            $user = auth()->user();
        } else {
            $user = User::where('email', $this->email)->first();
            if($user) {
                Cookie::queue(Cookie::make('checkout_service_slug', $service->slug, 60));
                return back()->with('info', "It seems we have an account with this email address please <a href='/login'>login</a> to continue.");
            } else {
                dd($this->payment_method);
                Cookie::queue(Cookie::forget('checkout_service_slug'));
                // $this->validate();
                $password = Str::random(8);
                $user = User::create([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'city' => $this->billing_address['city'],
                    'state' => $this->billing_address['state'],
                    'postal_code' => $this->billing_address['postal_code'],
                    'address' => $this->billing_address['address'],
                    'phone' => $this->phone,
                    'email' => $this->email,
                    'password' => Hash::make($password),
                ]);

                $billing = $user->billing()->create([
                    'city' => $this->billing_address['city'],
                    'state' => $this->billing_address['state'],
                    'postal_code' => $this->billing_address['postal_code'],
                    'address' => $this->billing_address['address'],
                ]);

                // new user email
                Mail::to($user->email)->bcc('admin@logoinusa.com')->send(new UserCreated($user, $password));
                auth()->loginUsingId($user->id);
            }
        }

        try {
            $service = $this->service;

            $order = Order::create([
                'customer_id' => $user->id,
                'service_id' => $service->id,
                'order_status' => 'pending',
                'price' => $service->price,
                'amount' => $service->price,
            ]);

            $customer = $order->user->createOrGetStripeCustomer();
            $order->user->addPaymentMethod($this->payment_method);
            $stripeCharge = $order->user->charge($order->price * 100, $this->payment_method);
            

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

        return redirect()->route('order.thankyou');
    }

    // update payment method 
    public function updatePaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;
        $this->emit('paymentMethodUpdated');
    }
}
