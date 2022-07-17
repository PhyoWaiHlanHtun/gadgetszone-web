<?php

namespace App\Http\Controllers\Auth;

use App\Models\AdminStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\UserLoginRequest;
use Illuminate\Validation\ValidationException;

class AdminStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest:adminstaff");
    }
    
    // public function registerForm()
    // {
    //     return view('auth.register');
    // }

    // public function register(UserRegisterRequest $request)
    // {
    //     // return $request->all();
    //     User::create([
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'referral' => $request->referral,
    //         'password' => bcrypt($request->password)
    //     ]);

    //     return redirect()->back()->with('message', '* Your registration is successfully done.');
    // }

    public function loginForm()
    {
        allGuardLogout();
        return view('auth.staff_login');
    }

    public function login(UserLoginRequest $request)
    {
        // return $request->all();
        allGuardLogout();
        if ($this->attemptLogin($request)) {
            // return redirect()->intended(route('adminstaff.dashboard'));
            return redirect()->route('adminstaff.dashboard');
        }
      
        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(Request $request)
    {
        // dd($request->email);
        return Auth::guard('adminstaff')->attempt(
            ['email' => $request->email, 'password' => $request->password],
            $request->get('remember')
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'error' => [trans('* Email or Password is incorrect .')],
        ]);
    }
}
