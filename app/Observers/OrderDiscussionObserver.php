<?php

namespace App\Observers;

use App\Models\Admin;
use App\Models\OrderDiscussion;
use App\Notifications\Admin\OrderDiscussionSubmitted as AdminOrderDiscussionSubmitted;
use App\Notifications\OrderDiscussionSubmitted;
use Illuminate\Support\Facades\Notification;

class OrderDiscussionObserver
{
    /**
     * Handle the OrderDiscussion "created" event.
     *
     * @return void
     */
    public function created(OrderDiscussion $orderDiscussion)
    {
        if ($orderDiscussion->discussable instanceof \App\Models\Admin) {
            $orderDiscussion->order->user->notify(new OrderDiscussionSubmitted($orderDiscussion));
        } else {
            $admins = Admin::whereIn('id', [1, $orderDiscussion->order->admin_id])->get();
            Notification::send($admins, new AdminOrderDiscussionSubmitted($orderDiscussion));
        }
    }

    /**
     * Handle the OrderDiscussion "updated" event.
     *
     * @return void
     */
    public function updated(OrderDiscussion $orderDiscussion)
    {
    }

    /**
     * Handle the OrderDiscussion "deleted" event.
     *
     * @return void
     */
    public function deleted(OrderDiscussion $orderDiscussion)
    {
    }

    /**
     * Handle the OrderDiscussion "restored" event.
     *
     * @return void
     */
    public function restored(OrderDiscussion $orderDiscussion)
    {
    }

    /**
     * Handle the OrderDiscussion "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(OrderDiscussion $orderDiscussion)
    {
    }
}
