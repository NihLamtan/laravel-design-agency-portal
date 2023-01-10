<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;
use PDF;
use App\Models\Payment;

class Orders extends Component
{
    public $orders;
    protected $payment_order_id;
    public $payment_method;
    public $save_payment_method;
    public $payment_methods;
    public $user_payment_method;
    public $targetted_order;
    public $payment_error;

    protected $listeners = ['paymentMethodAdded' => 'updatePaymentMethod'];

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function mount()
    {
        if (auth()->check()) {
            $user = auth()->user();

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
    
    public function hydrateUserPaymentMethod($value)
    {
        if ($value == 'new') {
            $this->emit('setupStripe');
            $this->emit('stripeRequest');
        }
    }

    public function render()
    {
        return view('livewire.order.orders');
    }

    public function updatePaymentOrderId($payment_order_id)
    {
        $this->payment_order_id = $payment_order_id;
        $this->targetted_order = $this->orders->where('id', $payment_order_id)->first();
        $this->emit('paymentOrderUpdated');
    }

    // listen to payment check updated event
    public function updatedUserPaymentMethod($value)
    {
        if ($value == 'new') {
            $this->emit('setupStripe');
            $this->emit('stripeRequest');
        }
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

    // update payment method
    public function updatePaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;
        // $this->emit('paymentMethodUpdated');
        $this->processPayment();
    }

    // process payment
    public function processPayment()
    {
        try {
            $order = $this->targetted_order;

            $customer = $order->user->createOrGetStripeCustomer();
            
            // attahcment payment method to customer
            if ($this->save_payment_method) {
                $this->attachPaymentMethod($order);
            }
            
            if ($this->user_payment_method && $this->user_payment_method != 'new') {
                $payment_method = $this->user_payment_method;
            } else {
                $payment_method = $this->payment_method;
            }
            $stripeCharge = $order->user->charge($order->price * 100, $payment_method);
            
            

            $order->update(['payment_status' => $stripeCharge->status]);

            // save invoice
            $invoice_filename = "{$order->order_id}.pdf";
            PDF::loadView('invoice.pdf', ['order' => $order])->save(storage_path("app/invoices/$invoice_filename"));
            $order->invoice()->create([
                'customer_id' => $order->customer_id,
                'filename' => $invoice_filename,
                'invoice_number' => $order->order_number,
            ]);

            $stripeCharge = Payment::create([
                'stripe_id' => $stripeCharge->id,
                'amount' => $stripeCharge->amount / 100,
                'status' => $stripeCharge->status,
                'payment_method' => $stripeCharge->payment_method,
                'currency' => $stripeCharge->currency,
                'customer_id' => $order->customer_id,
                'order_id' => $order->id,
            ]);
            session()->flash('success', "Thank you for paying $".$order->amount);
            return redirect()->route('orders.index', $order->id);
        } catch (\Stripe\Exception\CardException $e) {
            $this->payment_error = $e->getMessage();
            return false;
        }
    }
}
