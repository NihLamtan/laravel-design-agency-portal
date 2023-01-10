<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;


class InvoicesController extends Controller
{
    public function index()
    {
        $invoice = auth()->user()->invoice()->get();

        return view('invoices.index', ['invoices' => $invoice]);
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);

        return view('invoices.show', compact('invoice'));
    }
}
