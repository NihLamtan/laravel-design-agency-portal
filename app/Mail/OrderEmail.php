<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Order Successfull')->markdown('emails.order-email');
        if($this->order->invoice){
            $this->attach(storage_path("app/invoices/{$this->order->invoice->filename}"));
        }
        return $this;
    }
}
