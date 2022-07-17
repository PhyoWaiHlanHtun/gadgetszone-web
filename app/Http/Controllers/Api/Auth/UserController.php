<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Models\Agent;
use App\Models\Group;
use App\Models\Referral;
use App\Models\AdminStaff;
use App\Models\UserAmount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\AgentResource;
use App\Http\Resources\ReferralResource;
use App\Notifications\UserNotification;
use App\Http\Resources\UserAmountResource;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // return $request->all();
        
        $data = $request->validate([
            'username' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|digits_between:7,16',
            'password' => 'required|same:confirm-password',
            'confirm-password' => 'required',
            'referral' => 'required',
        ]);

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

                $agent= Agent::find($agentReferral->id);
                if ($agent) {
                    $agent->notify(new UserNotification($user));
                }
            } else {
                // For Other User Level
                $leaderA = User::getGroupALeaderId($referral) ?: $user->id ;

                $level_id = $referral->level_id;
                $level = ($level_id < 26) ? $level_id + 1 : $level_id;

                Referral::add($user->id, $level);
                UserAmount::add($user->id);
                Group::add($referral->user_id, $user->id);

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
            return response()->json([
                'status' => 200,
                'message' => "Referral Code is invalid.",
            ]);
        }

        $admin = AdminStaff::where('is_admin', 1)->first();
        $admin->notify(new UserNotification($user));

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => $user,
            'token' => $user->createToken('authToken')->accessToken
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($this->attemptLogin($request)) {
                if ($user->status) {
                    return response()->json([
                        'status' => 200,
                        'message' => "Success",
                        'data' =>  [
                            'user' => new UserResource($user),
                            'amount' => new UserAmountResource($user),
                            'referral' => new ReferralResource($user),
                            'agent' => new AgentResource($user->agent),
                        ],
                        'token' => $user->createToken('authToken')->accessToken
                    ]);
                } else {
                    return response()->json([
                        'status' => 401,
                        'message' => "Your account is inactive. Please contact to admin.",
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => "Email Or Password is incorrect."
                ]);
            }
        } else {
            return response()->json([
                'status' => 422,
                'message' => "Account does not exist."
            ]);
        }
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::guard('user')->attempt(
            [
             'email' => $request->email, 'password' => $request->password],
            $request->get('remember')
        );
    }

    public function logout()
    {
        $user = Auth::user()->token()->revoke();
        return response()->json([
            'status' => 200,
            'message' => "Successfully logged out."
        ]);
    }

    public function profile()
    {
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => new UserResource(User::findOrFail(Auth::id()))
        ]);
    }

    public function profile_edit(Request $request)
    {
        // return $request->all();
        $data = $request->validate([
            'username' => 'required|max:100',
            'phone' => 'required|numeric|digits_between:7,16',
            'password' => 'nullable|same:confirm-password',
            'confirm-password' => 'nullable',
        ]);

        $user = User::findOrFail(Auth::id());

        $user->update([
            'username' => $request->username,
            'phone' => $request->phone
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => "Successfully updated."
        ]);
    }

    public function dashboard()
    {
        $user = User::findOrFail(Auth::id());
        
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' =>  [
                'user' => new UserResource($user),
                'amount' => new UserAmountResource($user),
                'referral' => new ReferralResource($user),
                'agent' => new AgentResource($user->agent),
            ]
        ]);
    }
}
