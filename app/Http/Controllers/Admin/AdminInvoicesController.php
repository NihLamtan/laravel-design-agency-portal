<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;

class AdminInvoicesController extends Controller
{
    public function index()
    {
        $invoice = Invoice::latest()->get();

        return view('admin.invoice.index', ['invoices' => $invoice]);
    }
}
