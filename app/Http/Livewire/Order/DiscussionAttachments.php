<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

class DiscussionAttachments extends Component
{
    public $order;

    public function render()
    {
        return view('livewire.order.discussion-attachments');
    }

    public function exportAttachment($attachment_id)
    {
        $attachment = $this->order->attachments()->find($attachment_id)->filename;
        return response()->download(storage_path("app/order/{$this->order->order_id}/discussions/$attachment"));
    }
}
