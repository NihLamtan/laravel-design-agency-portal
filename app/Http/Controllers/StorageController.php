<?php

namespace App\Http\Controllers;

use App\Models\Storage as StorageModels;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function index()
    {
        $storages = auth()->user()->storage()->get();

        // $storages = StorageModels::get();

        return view('user-storage.index', ['storages' => $storages]);
    }

    public function show($id)
    {
        $storage = StorageModels::find($id);

        return Storage::download("order-file/$storage->file_name");
    }

    public function destroy($id)
    {
        $storage = StorageModels::find($id);

        $storage->delete();

        return redirect()->route('files.index');
    }
}
