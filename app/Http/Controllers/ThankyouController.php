<?php

namespace App\Http\Controllers;
use App\Models\Order;

class ThankyouController extends Controller
{
    public function index($id)
    {
        $order = Order::find($id);

        return view('order.thankyou', compact('order'));
    }
}
