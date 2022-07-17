<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\AdminStaff;
use App\Models\UserIdentity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserIdentityAddRequest;
use App\Http\Requests\UserIdentityEditRequest;
use App\Notifications\UserIdentityNotification;

class UserIdentityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        if (!Auth::user()->identity) {
            return view('frontend.identity.index');
        }
        if (Auth::user()->identity && Auth::user()->identity->status == 0) {
            return redirect('/')->with('warning', "* Please wait admin's approval for your id card.");
        }
        if (Auth::user()->identity && Auth::user()->identity->status == 1) {
            return redirect('/')->with('warning', '* You already uploaded ID Card.');
        }
        if (Auth::user()->identity && Auth::user()->identity->status == 2) {
            return redirect()->route('user.identity.edit');
        }
    }

    public function store(UserIdentityAddRequest $request)
    {
        // return $request->all();

        if (Auth::user()->identity) {
            return redirect('/')->with('warning', '* You already uploaded ID Card.');
        }

        $identity = UserIdentity::create([
                        'user_id' => Auth::id(),
                        'name' => $request->name,
                        'number' => $request->number,
                        'front' => storeImage($request->file('front'), 'identity'),
                        'back' => storeImage($request->file('back'), 'identity'),
                        'selfie' => storeImage($request->file('selfie'), 'identity'),
                    ]);

        $admin = AdminStaff::where('is_admin', 1)->first();
        $agent = User::getAgent(Auth::user());

        if ($agent) {
            $agent->notify(new UserIdentityNotification($identity));
        }
        $admin->notify(new UserIdentityNotification($identity));

        return redirect()->route('user.dashboard')->with('success', "* ID Card is successfully uploaded. Please wait admin's approval.");
    }

    public function edit()
    {
        $data = Auth::user()->identity;
        if (Auth::user()->identity && Auth::user()->identity->status != 2) {
            return redirect('/')->with('warning', "* You already uploaded ID Card.");
        }
        return view('frontend.identity.edit', compact('data'));
    }

    public function update(UserIdentityEditRequest $request)
    {
        // return $request->all();

        // if (Auth::user()->identity) {
        //     return redirect('/')->with('warning', '* You already uploaded ID Card.');
        // }

        $data = Auth::user()->identity;

        $identity = UserIdentity::findOrFail($data->id);
        
        $identity->update([
            'name' => $request->name,
            'number' => $request->number,
            'front' => storeImage($request->file('front'), 'identity'),
            'back' => storeImage($request->file('back'), 'identity'),
            'selfie' => storeImage($request->file('selfie'), 'identity'),
            'status' => 0
        ]);

        $admin = AdminStaff::where('is_admin', 1)->first();
        $agent = User::getAgent(Auth::user());

        if ($agent) {
            $agent->notify(new UserIdentityNotification($identity));
        }
        $admin->notify(new UserIdentityNotification($identity));

        return redirect()->route('user.dashboard')->with('success', "* Your ID Card is successfully updated. Please wait admin's approval");
    }
}
