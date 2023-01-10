<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\OrderDiscussion;

class OrderDiscussionSubmitted extends Notification
{
    use Queueable;

    protected $discussion;

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
        return ['database'];
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
                    ->line('New Message from Logoinusa')
                    ->action('View Order', route('orders.show', $this->orderDiscussion->id))
                    ->line("There is a new message from logoinusa on your Order #{$this->orderDiscussion->order->order_number}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $name = ($this->orderDiscussion->discussable instanceof \App\Models\User)
                ? $this->orderDiscussion->discussable->first_name
                : $this->orderDiscussion->discussable->name;
                
        return [
            'title' => 'New Message',
            'description' => "There is a new message from $name on your Order #{$this->orderDiscussion->order->order_number}"
        ];
    }
}
