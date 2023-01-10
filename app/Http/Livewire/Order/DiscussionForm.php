<?php

namespace App\Http\Livewire\Order;

use Livewire\WithFileUploads;
use Illuminate\Support\Str;

use Livewire\Component;

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

    public function test()
    {
        dd('test');
    }

    public function save()
    {
        $this->validate([
            'message' => 'required'
        ]);

        if ($this->attachment) {
            $this->validate([
                'attachment' => 'mimes:jpeg,bmp,png', // 100MB Max,
            ]);
        }
        
        $order = auth()->user()->orders()->where('order_id', $this->order->order_id)->first();
        if ($order) {
            $discussion = auth()->user()->discussions()->create([
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
