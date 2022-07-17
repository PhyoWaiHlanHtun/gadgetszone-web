<?php

namespace App\Http\Controllers\Backend;

use App\Models\UserIdentity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserIdentityController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:adminstaff,agent");
    }

    public function index()
    {
        if (Auth::guard('agent')->check()) {
            $data = UserIdentity::whereStatus(0)->whereHas('user', function ($query) {
                $query->where('agent_id', Auth::id());
            })->latest()->get();
        } else {
            $data = UserIdentity::whereStatus(0)->latest()->get();
        }
        // return $data;
        return view('backend.identity.index', compact('data'));
    }

    public function change($status, $id)
    {
        $identity = UserIdentity::findOrFail($id);
        
        if ($status == 'accept') {
            $identity->update([ 'status' => 1 ]);
        } else {
            $identity->update([ 'status' => 2 ]);
        }
        
        return back()->with('success', '* Successfully Done');
    }
}
