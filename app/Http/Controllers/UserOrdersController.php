<?php

namespace App\Http\Controllers;

use App\Models\OrderReview;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class UserOrdersController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->get();

        return view('user-orders.index', ['orders' => $orders]);
    }

    public function create()
    {
        $categories = ServiceCategory::with('services')->get();
        // dd($categories);

        return view('user-orders.create', compact('categories'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'message' => 'required',
            // 'name' => 'required',
        ]);

        OrderReview::create([
            'rating' => $request->rating,
            'message' => $request->message,
            'user_id' => auth()->user()->id,
            'order_id' => $request->order_id,
        ]);

        return redirect()->back();
    }

    public function show($order_id)
    {
        $order = auth()->user()->orders()->where('order_id', $order_id)->first();


        return view('user-orders.show', compact('order'));
    }

    public function index_complete()
    {
        $orders = auth()->user()->orders()->where(['order_status' => 'completed'])->get();

        return view('orders-complete.index', ['orders' => $orders]);
    }

    public function check_pricing()
    {
        $services = Service::get();

        return view('user-orders.pricing', compact('services'));
    }
}
