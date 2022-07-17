<?php

use Carbon\Carbon;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

function allGuardLogout()
{
    Auth::guard('user')->logout();
    Auth::guard('adminstaff')->logout();
    Auth::guard('agent')->logout();
    auth::guard()->logout();
}

function authPosition()
{
    $admin = config('app.locale') == 'ch' ? '行政' : 'Admin';
    $staff = config('app.locale') == 'ch' ? '职员' : 'Staff';
    $accountant = config('app.locale') == 'ch' ? '会计' : 'Accountant';
    $agent = config('app.locale') == 'ch' ? '代理人' : 'Agent';

    if (Auth::guard('adminstaff')->check()) {
        $auth = Auth::user()->is_admin;
        
        if ($auth == 1) {
            return $admin;
        } elseif ($auth == 2) {
            return $accountant;
        } else {
            return $staff;
        }
    } elseif (Auth::guard('agent')->check()) {
        return $agent;
    } else {
        return "-";
    }
}

function checkAuth()
{
    if (Auth::guard('user')->check()) {
        return route('user.dashboard');
    } elseif (Auth::guard('agent')->check()) {
        return route('agent.dashboard');
    } elseif (Auth::guard('adminstaff')->check()) {
        return "/dashboard";
    } else {
        return false;
    }
}

function checkAuthStatus()
{
    if (Auth::guard('user')->check() ||
        Auth::guard('adminstaff')->check() ||
        Auth::guard('agent')->check()
    ) {
        return 'true';
    } else {
        return 'false';
    }
}

function getReferralcode()
{
    if (Auth::guard('user')->check()) {
        return Auth::guard('user')->user()->referral->code;
    } elseif (Auth::guard('agent')->check()) {
        return Auth::guard('agent')->user()->referral;
    } else {
        return false;
    }
}

function purchased()
{
    $now = Carbon::now();
    if (Auth::guard('user')->check()) {
        return Purchase::whereDate('created_at', $now)->where('user_id', Auth::guard('user')->user()->id)->get();
    } else {
        return false;
    }
}
