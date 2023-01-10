<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Storage;

class OrderBriefController extends Controller
{
    public function index($id)
    {
        $order = Order::find($id);

        if ($order && !$order->brief) {
            return view("order-brief.{$order->service->category->slug}", ['order_id' => $id, 'order' => $order]);
        }

        return redirect()->route('orders.index')->with('error', 'Already Submitted Brief!');
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'inspiration_logo_file' => 'mimes:jpeg,png,jpg,doc,docx,pdf',
        ]);
        $order = Order::find($id);
        if ($order && !$order->brief) {
            $instructions = $request->instructions;

            if ($request->hasFile('inspiration_logo_file')) {
                $filename = uniqid().'.'.$request->inspiration_logo_file->getClientOriginalExtension();
                $request->inspiration_logo_file->storeAs('inspiration-logos', $filename);
                $instructions['Inspiration File'] = $filename;
            } else {
                $instructions['Inspiration File'] = '';
            }

            $order->brief()->create([
                'instructions' => $instructions,
                'user_id' => auth()->user()->id,
            ]);

            return redirect('orders')->with('success', 'Brief submitted successfully!');
        }

        return redirect()->route('orders.index')->with('error', 'Already Submitted Brief!');
    }

    public function show_image($id)
    {
        $order = auth()->user()->orders()->where('order_id', $id)->first();

        if ($order && $order->brief) {
            $filename = $order->brief->instructions['inspiration_file'];
            if (!Storage::exists("inspiration-logos/$filename")) {
                return \Response::make('File no found.', 404);
            }

            $file = Storage::get("inspiration-logos/$filename");
            $type = Storage::mimeType("inspiration-logos/$filename");
            $response = \Response::make($file, 200)->header('Content-Type', $type);

            return $response;
        }
    }
}
