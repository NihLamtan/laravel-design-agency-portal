<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Storage as StorageModels;
use App\Models\user;
use App\Notifications\UploadStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;


class AdminStorageController extends Controller
{
    public function index()
    {
        $storage = StorageModels::latest()->get();

        return  view('admin.storage.index', ['storages' => $storage]);
    }

    public function create()
    {
        $users = User::pluck('first_name', 'id')->toArray();

        return view('admin.storage.create', compact('users'));
    }

    public function store(Request $request)
    {
        request()->validate([
        'file_name' => 'required',
        'customer_id' => 'required',
    ]);

        if ($request->hasFile('file_name')) {
            $filename = $request->file_name->getClientOriginalName();
            $request->file('file_name')->storeAs('order-file', $filename);
        }

        $storage = StorageModels::create([
        'file_name' => $filename,
        'user_id' => $request->customer_id,
        ]);

        $user = User::find($request->customer_id);
        Notification::send($user, new UploadStorage($storage));

        return redirect()->route('admin.storage.index')->with('success', 'Storage has been created');
    }

    public function show($id)
    {
        $storage = StorageModels::find($id);

        return Storage::download("order-file/$storage->file_name");
    }

    public function edit($id)
    {
        $users = User::pluck('first_name', 'id')->toArray();

        $storage = StorageModels::find($id);

        return view('admin.storage.edit', compact('storage', 'users'));
    }

    public function update(Request $request, $id)
    {
        $storage = StorageModels::find($id);

        request()->validate([
            'file_name' => 'required',
            'customer_id' => 'required',
        ]);

        if ($request->hasFile('file_name')) {
            $filename = $request->file_name->getClientOriginalName().'.'.$request->file_name->getClientOriginalExtension();
            $request->file('file_name')->storeAs('order-file', $filename);
        }

        $storage->update([
            'file_name' => $filename,
            'user_id' => $request->customer_id,
            ]);

        return redirect()->route('admin.storage.index')->with('success', 'Storage has been updated');
    }

    public function destroy($id)
    {
        $storage = StorageModels::find($id);

        $storage->delete();

        return redirect()->route('admin.storage.index');
    }
}
