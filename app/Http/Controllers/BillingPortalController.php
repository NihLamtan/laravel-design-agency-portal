<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingPortalController extends Controller
{
    public function index()
    {
        $title = "Payment Methods";
        return auth()->user()->redirectToBillingPortal(route('orders.index'));
    }
}
