<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\Agent;
use App\Models\Group;
use App\Models\Referral;
use App\Models\AdminStaff;
use App\Models\UserAmount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserNotification;
use App\Http\Requests\Admin\UserEditRequest;
use App\Http\Requests\Admin\UserCreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $route = "backend.admin.user.";

    public function __construct()
    {
        $this->middleware("auth:adminstaff,agent");
    }

    public function index()
    {
        checkUsersExpireDate();
        checkUsersInvestProfitDate();
        $auth = Auth::guard('agent')->check() ? Auth::id() : '';
        return view("{$this->route}index", compact('auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("{$this->route}create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $referral = Referral::whereCode($request->referral)->first();
        $status = $referral?->user->status;

        $agentReferral = Agent::whereReferral($request->referral)->first();
        $agentStatus = $agentReferral?->status;
        
        if (($referral && $status) || ($agentReferral && $agentStatus)) {
            // return "Referral Code Exits";

            $user = User::add($request);

            if ($agentReferral && $agentStatus) {
                // For Level A User
                $agent_id = ($agentReferral->referral) ? $agentReferral->id : null;

                if (Auth::guard('agent')->check()) {
                    $agent_id = Auth::id();
                }

                User::find($user->id)->update([
                    'agent_id' => $agent_id,
                    'tree_leader_id' => $user->id
                ]);

                $agent = Agent::find($agent_id);
                if ($agent) {
                    $agent->notify(new UserNotification($user));
                }
                
                Referral::create([
                    'code' => Referral::generateReferralCode(), // random generate
                    'user_id' => $user->id,
                    'level_id' => 1
                ]);

                UserAmount::add($user->id);
            } else {
                // For Other User Level

                $level_id = $referral->level_id;
            
                Referral::create([
                    'code' => Referral::generateReferralCode(), // random generate
                    'user_id' => $user->id,
                    'level_id' => ($level_id < 26) ? $level_id + 1 : $level_id
                ]);

                UserAmount::add($user->id);

                Group::create([
                    'leader_id' => $referral->user_id ,
                    'member_id' => $user->id
                ]);

                $leaderA = User::getGroupALeaderId($referral) ?: $user->id ;
                $agent_id = (Auth::guard('agent')->check()) ? Auth::id() : User::getAgent($user)?->id;
                
                User::find($user->id)->update([
                    'referral_id' => $referral->id,
                    'agent_id' => $agent_id,
                    'tree_leader_id' => $leaderA
                ]);

                $agent = User::getAgent($user);
                if ($agent) {
                    $agent->notify(new UserNotification($user));
                }
            }
        } else {
            return redirect()->back()->with('warning', '* Referral Code is invalid.');
        }
        $admin = AdminStaff::where('is_admin', 1)->first();
        $admin->notify(new UserNotification($user));

        return redirect()->route('user.index')->with('success', '* Successfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('checkAuth', $user);
        $user = checkExpireDate($user);
        checkInvestProfitDate($user);
        return view("{$this->route}show", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('checkAuth', $user);
        return view("{$this->route}edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        $this->authorize('checkAuth', $user);
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
        return redirect()->route('user.index')->with('success', '* Successfully Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', '* Successfully Deleted.');
    }

    public function activate($status, $id)
    {
        // return $status;
        $user = User::findOrFail($id);
        $this->authorize('checkAuth', $user);
        $user->update([
            'status' => ($status == 'activate') ? 1 : 0
        ]);
        // return redirect()->route('user.index')->with('success', '* Successfully Done.');
        return back()->with('success', '* Successfully Done.');
    }
}
