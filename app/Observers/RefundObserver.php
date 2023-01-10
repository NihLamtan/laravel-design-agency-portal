<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\Refund;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Admin\OrderRefundRequested as AdminOrderRefundRequested;
use App\Notifications\OrderRefundRequested;

class RefundObserver
{
    public function created(Refund $refund)
    {
        $admins = Admin::whereIn('id', [1, $refund->order->admin_id])->get();
        Notification::send($admins, new AdminOrderRefundRequested($refund));
        // notify customer
        $refund->user->notify(new OrderRefundRequested($refund));
    }
}
