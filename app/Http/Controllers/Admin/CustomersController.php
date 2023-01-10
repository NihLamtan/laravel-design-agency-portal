<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class CustomersController extends Controller
{
    public function index()
    {
        $users = User::with('billing')->get();

        return view('admin.customers.index', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.customers.edit', compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);

        $user->update(request()->all());

        return redirect('admin/customers');
    }
}
