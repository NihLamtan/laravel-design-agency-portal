<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Refund;

class AdminRefundsController extends Controller
{
    public function __construct()
    {
        $this->middleware('super_admin')->except('index_request');
    }
    
    public function index()
    {
        $refund = Refund::with('user', 'order')->get();

        return view('admin/refund.index', ['refunds' => $refund]);
    }

    public function index_request()
    {
        $refund = Refund::with('user', 'order')->get();

        return view('admin/refund-request.index', ['refunds' => $refund]);
    }

    public function update($id)
    {

        $refund = Refund::with(['order.payment' => function ($q) {
            return $q->where('status', 'succeeded');
        }])->find($id);

       
        if ($refund->order && $refund->order->payment) {
            $payment = $refund->order->payment;
            $refund->order->user->refund($payment->stripe_id);
            $payment->update([
                'status' => 'refunded'
            ]);
            $refund->order->update([
                'order_status' => 'refunded',
                'payment_status' => 'refunded'
            ]);
        }

        return redirect()->back();
    }
}
