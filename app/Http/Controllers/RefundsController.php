<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\RefundReq;
use App\Models\Admin;
use App\Models\User;

use Illuminate\Support\Facades\Mail;

class RefundsController extends Controller
{
    public function store(Request $request)
    {
        request()->validate([
            'reason' => 'required',
            'message' => 'required',
            'order_id' => 'required',
            // 'user_id' => 'requierd',
        ]);

        $order = Order::find($request->order_id);
        if ($order && $order->refundable()) {
            $refund = $order->refund()->create([
                'reason' => $request->reason,
                'message' => $request->message,
                'user_id' => auth()->user()->id,
             ]);

            $order->refundReq();
            // $user = User::find($id);
            // $admin = Admin::find(1);

            // Mail::to($user->email)->bcc('admin@logoinusa.com')->send(new RefundReq());


            return back()->with('success', 'Refund requested successfully! We will get back to you within 24 hours!');
            

            
            
        }

        return back()->with('error', 'Order not refundable!');
    }
}
