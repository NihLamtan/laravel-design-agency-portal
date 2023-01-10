<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class AdminNotificationsController extends Controller
{
    public function index()
    {
        $notification = Notification::latest()->get();

        return view('admin.notification.index', ['notifications' => $notification]);
    }
}
