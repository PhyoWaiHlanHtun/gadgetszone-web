<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user,adminstaff,agent');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adminstaff  = Auth::guard('adminstaff')->check();
        $agent       = Auth::guard('agent')->check();
        $user        = Auth::guard('user')->check();
        
        if ($adminstaff) {
            return redirect()->route('adminstaff.dashboard');
        } elseif ($agent) {
            return redirect()->route('agent.dashboard');
        } elseif ($user) {
            return redirect()->route('user.dashboard');
        } else {
            return redirect("/");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
