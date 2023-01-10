<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use App\Models\Package;
use App\Notifications\OrderUpdated;
use Illuminate\Support\Facades\Notification;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('super_admin')->only('edit', 'update');
    }
    public function index()
    {
        $orders = Order::with(['user', 'service'])->paginate();

        return view('admin/orders.index', ['orders' => $orders]);
    }

    public function create()
    {
        $users = User::pluck('first_name', 'id')->toArray();
        $services = Service::pluck('name', 'id')->toArray();
        $servicesAll = Service::get();
        $packages = Package::pluck('title', 'id')->toArray();



        $categories = ServiceCategory::pluck('name', 'id')->toArray();


        return view('admin/orders.create', compact('services', 'users', 'categories', 'packages'));
    }

    public function store(Request $request)
    {
        $service = Service::find($request->service_id);
        $package = Package::find($request->package_id);
        
       $amount = $service->price;

       if($package)
       {
           $amount = $package->amount;
       }
      
         $order =  Order::create([
            'price' => $amount,
            'discount' => $request->discount,
            'order_status' => 'pending',
            'payment_status' => 'pending',
            'service_id' => $request->service_id,
            'package_id' => $request->package_id,
            'customer_id' => $request->customer_id,

        ]);
         
       


        return  redirect()->route('admin.orders.index')->with('success', 'Order has been created');
    }

    public function show($id)
    {
        $order = Order::find($id);

        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $services = Service::pluck('name', 'id')->toArray();
        $packages = Package::pluck('title', 'id')->toArray();
        $users = User::pluck('first_name', 'id')->toArray();



        return view('admin/orders.edit', compact('order', 'services', 'packages', 'users'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $order->update([
            'price' => $request->price,
            'discount' => $request->discount,
            'order_status' => $request->order_status,
            'payment_status' => $request->payment_status,           
            'package_id' => $request->package_id,
        ]);

        // $order->save();

        return redirect('admin/orders');
        
    }

    
}
