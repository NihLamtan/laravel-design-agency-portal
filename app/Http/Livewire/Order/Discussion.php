<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

class Discussion extends Component
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.order.discussion');
    }

    public function save()
    {
        $this->validate([
            'attachment' => 'image|max:1e+8', // 100MB Max
        ]);
        $order = auth()->user()->orders()->with('userable', 'attachments')->where('order_id', $this->order->order_id)->first();
        if ($order) {
            $discussion = auth()->user()->discussions()->create([
                'order_id' => $order->id,
                'message' => $this->message,
            ]);
            $filename = Str::uuid().'.'.$this->attachment->getClientOriginalExtension();
            $this->attachment->storeAs("order/$order->order_id/discussions", $filename);
            $discussion->attachments()->create([
                'filename' => $filename,
            ]);
            session()->flash('success', 'Comment Added!');
        }
        session()->flash('error', 'Something went wrong!');
    }

    public function exportAttachment($discussion_id, $attachment_id)
    {
        $attachment = $this->order->attachments()->find($attachment_id)->filename;

        return response()->download(storage_path("app/order/{$this->order->order_id}/discussions/$attachment"));
    }
}
