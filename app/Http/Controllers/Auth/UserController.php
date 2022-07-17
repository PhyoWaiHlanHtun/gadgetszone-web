<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Agent;
use App\Models\Group;
use App\Models\Referral;
use App\Models\AdminStaff;
use App\Models\UserAmount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;
use App\Http\Requests\Auth\UserLoginRequest;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Auth\UserRegisterRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest:user");
    }
    
    public function registerForm()
    {
        allGuardLogout();
        return view('auth.register');
    }

    public function register(UserRegisterRequest $request)
    {
        // return $request->all();
        allGuardLogout();

        $referral = Referral::whereCode($request->referral)->first();
        $status = $referral?->user->status;

        $agentReferral = Agent::whereReferral($request->referral)->first();
        
        $agentStatus = $agentReferral?->status;

        if (($referral && $status) || ($agentReferral && $agentStatus)) {
            // return "Referral Code Exits";
            
            $user = User::add($request);

            if ($agentReferral && $agentStatus) {
                // For Level A User
                User::find($user->id)->update([
                    'agent_id' => $agentReferral->id,
                    'tree_leader_id' => $user->id
                ]);
                
                Referral::add($user->id, 1);
                UserAmount::add($user->id);

                $agent = Agent::find($agentReferral->id);
                $agent->notify(new UserNotification($user));
            } else {
                // For Other User Level

                $level_id = $referral->level_id;
                $level = ($level_id < 26) ? $level_id + 1 : $level_id;

                Referral::add($user->id, $level);
                UserAmount::add($user->id);
                Group::add($referral->user_id, $user->id);

                $leaderA = User::getGroupALeaderId($referral) ?: $user->id ;
                
                User::find($user->id)->update([
                    'referral_id' => $referral->id,
                    'agent_id' => User::getAgent($user)?->id,
                    'tree_leader_id' => $leaderA
                ]);

                $agent = User::getAgent($user);
                if ($agent) {
                    $agent->notify(new UserNotification($user));
                }
            }
        } else {
            return redirect()->back()->with('warning', '* Referral code is invalid.');
        }

        $admin = AdminStaff::where('is_admin', 1)->first();
        $admin->notify(new UserNotification($user));

        return redirect()->route('user.login')->with('success', "* Your registration is successfully done. You can log in now .");
    }

    public function loginForm()
    {
        allGuardLogout();
        return view('auth.login');
    }

    public function login(UserLoginRequest $request)
    {
        // return $request->all();
        allGuardLogout();
        if ($this->attemptLogin($request)) {
            // return redirect()->intended(route('user.dashboard'));
            return redirect()->route('user.dashboard');
        }
        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(Request $request)
    {
        // dd($request->email);
        return Auth::guard('user')->attempt(
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
