<?php

namespace App\Http\Controllers\Backend;

use App\Models\AdminStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileEditRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:adminstaff,agent");
    }

    public function index()
    {
        $user = Auth::user();
        return view("backend.setting.profile", compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view("backend.setting.edit", compact('user'));
    }

    public function update(ProfileEditRequest $request)
    {
        // return $request->all();
        $user = AdminStaff::findOrFail(Auth::id());

        $user->update([
            'username' => $request->username,
            // 'email' => $request->email,
            'phone' => $request->phone
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('account.profile')->with('success', 'Successfully Updated');
    }
}
