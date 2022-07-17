<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\Agent;
use App\Models\Referral;
use App\Models\AdminStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AgentNotification;
use App\Http\Requests\Admin\AgentEditRequest;
use App\Http\Requests\Admin\AgentCreateRequest;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $route = "backend.admin.agent.";

    public function __construct()
    {
        $this->middleware("auth:adminstaff");
    }

    public function index()
    {
        return view("{$this->route}index");
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
    public function store(AgentCreateRequest $request)
    {
        $agent = Agent::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password),
                    'referral' => Referral::generateReferralCode(),
                    'status' => 1
                ]);
        $admin = AdminStaff::where('is_admin', 1)->first();
        $admin->notify(new AgentNotification($agent));

        return redirect()->route('agent.index')->with('success', '* Successfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        return view("{$this->route}edit", compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgentEditRequest $request, Agent $agent)
    {
        $agent->update([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        if ($request->password) {
            $agent->update([
                'password' => Hash::make($request->password)
            ]);
        }
        return redirect()->route('agent.index')->with('success', '* Successfully Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agent.index')->with('success', '* Successfully Deleted.');
    }

    public function activate($status, $id)
    {
        // return $status;
        Agent::findOrFail($id)->update([
            'status' => ($status == 'activate') ? 1 : 0
        ]);
        return redirect()->route('agent.index')->with('success', '* Successfully Done.');
    }

    // User Tree
    public function tree($id)
    {
        $agent = Agent::findOrFail($id)->username;

        $users = User::where('agent_id', $id)->whereHas('referral', function ($query) {
            $query->where('level_id', 1);
        })->paginate(1);
        $levelA = $users[0];
        // return $users;
        $userLists = User::where('tree_leader_id', $users[0]->id)->get();
        
        return view("backend.agent.user_tree", compact('users', 'agent', 'levelA', 'userLists'));
    }
}
