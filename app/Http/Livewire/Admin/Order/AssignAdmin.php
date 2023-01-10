<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\Order;
use App\Models\Admin;
use App\Notifications\Admin\OrderAssigned;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AssignAdmin extends Component
{
    use AuthorizesRequests;

    public $order;
    public $admins;

    public function __construct($order)
    {
        $this->admins = Admin::exceptSuperAdmin()->pluck('name', 'id')->toArray();
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.admin.order.assign-admin');
    }

    public function save($admin_id)
    {
        // $this->authorize('update-order-admin');
        $this->order->admin_id = $admin_id;
        $this->order->save();
        $admin = Admin::find($admin_id);
        $admin->notify(new OrderAssigned($this->order));
    }
}
