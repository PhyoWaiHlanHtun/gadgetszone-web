<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:adminstaff,agent');
    }

    public function index()
    {
        $notifications =  Auth::user()->unreadNotifications;
        return view("backend.all-notifications", compact('notifications'));
    }

    public function mark_all()
    {
        // Auth::user()->notifications->markAsRead();
        
        $model = Auth::guard('adminstaff')->check() ? "App\Models\AdminStaff" : "App\Models\Agent";

        $data = Auth::user()->notifications
                    ->where('notifiable_type', $model)
                    ->where('notifiable_id', Auth::id());
                    
        foreach ($data as $dt) {
            $dt->delete();
        }

        return redirect('/dashboard');
    }
}
