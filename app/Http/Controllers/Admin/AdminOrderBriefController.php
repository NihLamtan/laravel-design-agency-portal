<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderBrief;
use Illuminate\Http\Request;

class AdminOrderBriefController extends Controller
{
    public function index($id)
    {
        $order = Order::find($id);

        return view("admin/admin-order-brief.{$order->service->category->slug}", ['order' => $order]);

        // return redirect()->route('admin.orders')->with('error', 'Already Submitted Brief!');
    }

    public function store(Request $request, $id)
    {
      $brief =  $request->validate([
            'inspiration_logo_file' => 'mimes:jpeg,png,jpg,doc,docx,pdf',
            // 'user_id' => 'required',
        ]);

        $order = Order::find($id);
        $instructions = $request->instructions;
        if ($request->hasFile('inspiration_logo_file')) {
            $filename = uniqid().'.'.$request->inspiration_logo_file->getClientOriginalExtension();
            $request->inspiration_logo_file->storeAs('inspiration-logos', $filename);
            $instructions['Inspiration File'] = $filename;
        } else {
            $instructions['Inspiration File'] = '';
        }

             OrderBrief::create([
                'instructions' => $instructions,
                'user_id' => $order->customer_id,
                'order_id' => $order->id,
            ]);

        // dd($request->user_id);
        // return redirect('admin.orders')->with('succes', 'Brief submitted successfully!');

        return redirect()->route('admin.orders.index');
        // ->with('error', 'Already Submitted Brief!');
    }

    public function edit($id)
    {
        
        $order = Order::find($id);
        return view('admin.order-brief.edit', compact('order'));
    }

}
