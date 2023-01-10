<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAttachmentController extends Controller
{
    public function index($folder, $file)
    {
        $pathToFile = str_replace('.', '/', $folder);

        return response()->file(storage_path("app/$pathToFile/$file"));
    }
}
