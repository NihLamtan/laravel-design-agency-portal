<?php

namespace App\Http\Livewire;

// use App/Models/Notification;
use Livewire\Component;

class Notification extends Component
{
    public $notifications;

    public function render()
    {
        $this->notifications = auth()->user()->notifications;

        return view('livewire.notification');
    }
}
