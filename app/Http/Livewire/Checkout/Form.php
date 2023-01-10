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
use App\Models\Coupon;
use App\Models\Admin;
use App\Notifications\Admin\OrderPaymentFailed;
use Illuminate\Support\Facades\Notification;

class Form extends Component
{
    public $service;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $billing_address;
    public $payment_method;
    public $save_payment_method = true;
    public $payment_methods;
    public $user_payment_method;
    public $coupon_code;
    public $coupon_message;
    public $coupon_class;
    public $discount = 0;
    public $coupon;
    public $service_package;
    public $make_address_default = false;

    protected $listeners = ['paymentMethodAdded' => 'updatePaymentMethod'];

    public function mount()
    {
 
        if (auth()->check()) {
            $user = auth()->user();
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->email = $user->email;
            $this->phone = $user->phone;

            $billing = auth()->user()->user_address;
            if ($billing) {
                $this->billing = [
                    'state' => $billing->state,
                    'city' => $billing->city,
                    'postal_code' => $billing->postal_code,
                    'address' => $billing->address,

                ];
            }
            
            // $this->payment_methods = $user->paymentMethods()->toArray();
            $this->payment_methods = $user->paymentMethods()->map(function ($payment_method) {
                return [
                   'id' => $payment_method->id,
                   'brand' => $payment_method->card->brand,
                   'last4' => $payment_method->card->last4,
               ];
            });
            $default_payment_method = $user->defaultPaymentMethod();
            if ($default_payment_method) {
                $this->user_payment_method = $default_payment_method->id;
            }
            if (!count($this->payment_methods)) {
                $this->user_payment_method = 'new';
            }
        } else {
            $this->payment_methods = [];
        }
    }

    public function render()
    {
        return view('livewire.checkout.form');
    }

    public function submit()
    {
        $service = $this->service;

        if (auth()->check()) {
            $user = auth()->user();
        } else {
            $user = User::where('email', $this->email)->first();
            if ($user) {
                Cookie::queue(Cookie::make('checkout_service_slug', $service->slug, 60));
                return back()->with('info', "It seems we have an account with this email address please <a href='/login'>login</a> to continue.");
            } else {
                Cookie::queue(Cookie::forget('checkout_service_slug'));
                // $this->validate();
                $password = Str::random(8);
                $user = User::create([
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'phone' => $this->phone,
                    'email' => $this->email,
                    'password' => Hash::make($password),
                ]);

          

                


                // new user email
                Mail::to($user->email)->bcc('admin@logoinusa.com')->send(new UserCreated($user, $password));
                auth()->loginUsingId($user->id);
            }
        }

        try {
            $service = $this->service;

            $amonut = $service->price;

            if($this->service_package)
            {
                $amonut = $this->service_package->amount;

            }
            
            if(!$user->user_address){

              $user->user_address()->create([
                    'city' => $this->billing_address['city'],
                    'state' => $this->billing_address['state'],
                    'postal_code' => $this->billing_address['postal_code'],
                    'address' => $this->billing_address['address'],
    
                ]);
            } elseif($user->user_address && $this->make_address_default) {
                $user->user_address()->update([
                    'city' => $this->billing_address['city'],
                    'state' => $this->billing_address['state'],
                    'postal_code' => $this->billing_address['postal_code'],
                    'address' => $this->billing_address['address'],
                ]);
            }


            $order = Order::create([
                'coupon_id' => $this->coupon ? $this->coupon->id : null,
                'customer_id' => $user->id,
                'service_id' => $service->id,
                'order_status' => 'pending',
                'price' => $amonut,
                'discount' => $this->discount,
                'amount' => $amonut - $this->discount,
            ]);

             $order->billing_address()->create([
                'city' => $this->billing_address['city'],
                'state' => $this->billing_address['state'],
                'postal_code' => $this->billing_address['postal_code'],
                'address' => $this->billing_address['address'],
                'user_id' => $user->id,
            ]);

         
            
            $customer = $order->user->createOrGetStripeCustomer();

            // mark coupon as used by user
            if ($this->coupon) {
                $this->coupon->usages()->create([
                    'user_id' => $user->id
                ]);
            }
            
            // attahcment payment method to customer
            if ($this->save_payment_method) {
                $this->attachPaymentMethod($order);
            }

            if ($this->user_payment_method && $this->user_payment_method != 'new') {
                $payment_method = $this->user_payment_method;
            } else {
                $payment_method = $this->payment_method;
            }
            $stripeCharge = $order->user->charge($order->amount * 100, $payment_method);

            

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
        } catch (\Stripe\Exception\CardException $e) {
            $error = $e->getJsonBody()['error'];
            
            $stripeCharge = Payment::create([
                'stripe_id' => $error['payment_intent']['id'],
                'amount' => $order->amount,
                'amount' => $service_package->amount,
                'status' => $error['decline_code'],
                'payment_method' => $error['payment_method']['id'],
                'currency' => 'USD',
                'customer_id' => $user->id,
                'order_id' => $order->id,
                'data' => $error
            ]);
            $admins = Admin::whereIn('id', [1])->get();
            Notification::send($admins, new OrderPaymentFailed($order));

            session()->flash('error', $e->getMessage());
            return redirect()->route('thankyou', $order->id);
        }

        return redirect()->route('thankyou', $order->id);
    }
    
   
    // listen to payment check updated event
    public function updatedUserPaymentMethod($value)
    {
        if ($value == 'new') {
            $this->emit('setupStripe');
            $this->emit('stripeRequest');
        }
    }

    // update payment method
    public function updatePaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;
        $this->emit('paymentMethodUpdated');
    }

    // attachment payment method to user
    protected function attachPaymentMethod($order)
    {
        $user = $order->user;
        if (($this->user_payment_method == 'new' || !$this->user_payment_method)) {
            if ($user->hasDefaultPaymentMethod()) {
                $user->addPaymentMethod($this->payment_method);
            } else {
                $user->updateDefaultPaymentMethod($this->payment_method);
            }
        }
    }

    // apply coupon code
    public function applyCoupon()
    {
        $coupon = Coupon::code($this->coupon_code)->first();
        if ($coupon && $coupon->is_valid($this->email)) {
            if ($coupon->type == 'amount') {
                $this->discount = $coupon->amount;
            } else {
                $this->discount = (($this->service->price / 100) * $coupon->amount);
            }
            $this->coupon_message = 'Coupon Applied!';
            $this->coupon_class = 'success';
            $this->coupon = $coupon;
        } else {
            $this->discount = 0;
            $this->coupon_message = 'Invalid Coupon Code!';
            $this->coupon_class = 'danger';
        }
    }
}
