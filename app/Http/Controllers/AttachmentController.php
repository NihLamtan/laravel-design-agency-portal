<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function index($folder, $file)
    {
        $pathToFile = str_replace('.', '/', $folder);

        return response()->file(storage_path("app/$pathToFile/$file"));
    }
}
