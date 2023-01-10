<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\Order;
use App\Notifications\Admin\OrderSubmitted as AdminOrderSubmitted;
use App\Notifications\OrderSubmitted;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @return void
     */
    public function created(Order $order)
    {
        $order->user->notify(new OrderSubmitted($order));

        $admin = Admin::find(5);
        if ($admin) {
            $admin->notify(new AdminOrderSubmitted($order));
        }
    }

    /**
     * Handle the Order "updated" event.
     *
     * @return void
     */
    public function updated(Order $order)
    {
        if($order->isdirty('order_status')){
        $order->user->notify(new OrderSubmitted($order));
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @return void
     */
    public function deleted(Order $order)
    {
    }

    /**
     * Handle the Order "restored" event.
     *
     * @return void
     */
    public function restored(Order $order)
    {
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Order $order)
    {
    }
}
