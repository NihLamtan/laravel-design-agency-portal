<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingAddressController extends Controller
{
    public function index()
    {
        return view('account.user.billing');
    }

    public function update(Request $request)
    {
        if(auth()->user()->user_address()){
        auth()->user()->billing()->update([
            'city' => $request->city,
            'state' => $request->state,
             'postal_code' => $request->postal_code,
             'address' => $request->address,
        ]);
        }
        if(!auth()->user()->user_address()){
            auth()->user()->billing()->create([
                'city' => $request->city,
                'state' => $request->state,
                 'postal_code' => $request->postal_code,
                 'address' => $request->address,
            ]);
            }


        return redirect()->back()->with('success', 'Profile has been update');

    }
}
