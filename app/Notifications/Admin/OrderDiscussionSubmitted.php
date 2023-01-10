<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\OrderDiscussion;

class OrderDiscussionSubmitted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(OrderDiscussion $orderDiscussion)
    {
        $this->orderDiscussion = $orderDiscussion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Order Discussion!')
                    ->action('View Order', route('admin.orders.show', $this->orderDiscussion->order_id))
                    ->line("{$this->orderDiscussion->order->user->first_name} submitted a message on Order #{$this->orderDiscussion->order->order_number}.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'Order Discussion',
            'description' => "{$this->orderDiscussion->order->user->first_name} submitted a message on Order #{$this->orderDiscussion->order->order_number}.",
            'link' => route('admin.orders.show', $this->orderDiscussion->order_id)
        ];
    }
}
