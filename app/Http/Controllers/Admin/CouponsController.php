<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function __construct()
    {
        $this->middleware('super_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::get();
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate_inputs($request);
        $coupon = Coupon::create($request->all());
        if ($request->emails) {
            $users = User::whereIn('email', explode(',', $request->emails))->pluck('email', 'id')->toArray();
            $users_data = array_map(function ($user_id) {
                return [
                    'user_id' => $user_id
                ];
            }, array_keys($users));
            $coupon->users()->createMany($users_data);
        }
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        return $coupon;
        $this->validate_inputs($request, $coupon);
        $coupon->update($request->all());
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return back()->with('success', 'Coupon Deleted!');
    }

    /**
     * validate inputes
     */
    public function validate_inputs($request, $coupon=null)
    {
        $this->validate($request, [
            'code' => 'required',
            'type' => 'required|in:percent,amount',
            'amount' => 'required'
        ]);
    }
}
