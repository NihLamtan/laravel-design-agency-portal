<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function store()
    {
        Leads::create(request()->all());

        return redirect()->back();
    }
}
