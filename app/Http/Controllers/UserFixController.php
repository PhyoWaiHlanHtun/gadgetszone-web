<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Http\Request;

class UserFixController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:adminstaff','isAdmin']);
    }
    
    public function agent_null()
    {
        $users = User::whereNull('agent_id')->get();
        $test = [];
        // return $users;
        foreach ($users as $user) {
            $test[$user->id]['tree_leader_id'] = User::getGroupALeaderId($user->referral);
            $test[$user->id]['agent_id'] = User::getAgent($user)?->id;
        }

        return $test;
    }

    public function agent_null_fix()
    {
        $users = User::whereNull('agent_id')->get();
                
        foreach ($users as  $user) {
            $user->update([
                'agent_id' => User::getAgent($user)?->id,
            ]);
        }
        
        return 'success';
    }

    public function tree_leader_null()
    {
        $users = User::whereNull('tree_leader_id')->get();
        $test = [];
        foreach ($users as  $user) {
            $test[$user->id]['tree_leader_id'] = User::getGroupALeaderId($user->referral);
            $test[$user->id]['agent_id'] = User::getAgent($user)?->id;
        }
        return $test;
    }

    public function tree_leader_fix()
    {
        $users = User::whereNull('tree_leader_id')->get();

        foreach ($users as  $user) {
            $user->update([
                'tree_leader_id' => User::getGroupALeaderId($user->referral),
                'agent_id' => User::getAgent($user)?->id,
            ]);
        }

        return 'success';
    }

    // Code
    public function agent_error()
    {
        $data = User::whereNull('agent_id')->get();

        return view('backend.admin.agent.fix', compact('data'));
    }

    public function agent_fix($id)
    {
        $data = User::findOrFail($id);
        // return $data;
        $agents = Agent::all();
        return view('backend.admin.agent.fix-form', compact('data', 'agents'));
    }

    public function agent_fix_edit(Request $request, $id)
    {
        // return $request->all();
        Agent::findOrFail($request->agent_id);

        User::findOrFail($id)->update([
            'agent_id' => $request->agent_id
        ]);

        return redirect()->route('agent.error')->with('success', "* Sucessfully Updated");
    }
}
