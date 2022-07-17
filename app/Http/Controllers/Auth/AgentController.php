<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\UserLoginRequest;
use Illuminate\Validation\ValidationException;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest:agent");
    }

    public function loginForm()
    {
        allGuardLogout();
        return view('auth.agent_login');
    }

    public function login(UserLoginRequest $request)
    {
        // return $request->all();
        allGuardLogout();
        if ($this->attemptLogin($request)) {
            // return redirect()->intended(route('agent.dashboard'));
            return redirect()->route('agent.dashboard');
        }
        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(Request $request)
    {
        // dd($request->email);
        return Auth::guard('agent')->attempt(
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
