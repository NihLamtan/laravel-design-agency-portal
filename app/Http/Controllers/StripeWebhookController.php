<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreated;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class StripeWebhookController extends CashierController
{
    public function handleChargeFailed($payload)
    {
        // Mail::to('admin@test.com')->send(new UserCreated(\App\Models\User::first(), 'admin123'));
        \App\Models\Payment::create([
            'order_id' => 1,
            'stripe_id' => 'test',
            'amount' => 0,
            'payment_method' => '-',
            'currency' => 'USD',
            'customer_id' => 1,
            'payload' => $payload
        ]);
    }
}
