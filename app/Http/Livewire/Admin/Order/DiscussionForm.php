<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class DiscussionForm extends Component
{
    use WithFileUploads;

    public $order;
    public $attachment;
    public $message;

    protected $rules = [
        'message' => 'required',
    ];

    public function __construct($order)
    {
        $this->order = $order;
    }
    
    public function render()
    {
        return view('livewire.order.discussion-form');
    }

    public function save()
    {
        $this->validate([
            'message' => 'required'
        ]);

        if ($this->attachment) {
            $this->validate([
                'attachment' => 'image|max:1e+8', // 100MB Max
            ]);
        }
        
        $order = Order::where('order_id', $this->order->order_id)->first();
        if ($order) {
            $discussion = auth()->guard('admin')->user()->discussions()->create([
                'order_id' => $order->id,
                'message' => $this->message,
            ]);
            if ($this->attachment) {
                $filename = Str::uuid(10).'.'.$this->attachment->getClientOriginalExtension();
                $this->attachment->storeAs("order/$order->order_id/discussions", $filename);
                $discussion->attachments()->create([
                    'filename' => $filename
                ]);
            }
            $this->reset(['message', 'attachment']);
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }
}
