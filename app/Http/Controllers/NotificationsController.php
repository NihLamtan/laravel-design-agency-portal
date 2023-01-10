<?php

namespace App\Http\Controllers;

class NotificationsController extends Controller
{
    public function index()
    {
    
        auth()->user()->unreadNotifications->markAsRead();
        return view('notification.index');
    }
}
