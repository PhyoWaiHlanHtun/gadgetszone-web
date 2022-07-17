<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerTreeController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:adminstaff,agent");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $agent_id = $user->agent_id;
        $groupB = Group::where('leader_id', $user->id)->get();

        User::where('tree_leader_id', $id)->delete();

        if (Auth::guard('agent')->check()) {
            return redirect()->route('backend.customer-tree')->with('success', '* Successfully Deleted All');
        } else {
            return redirect()->route('backend.agent.customer-tree', $agent_id)->with('success', '* Successfully Deleted All');
        }
    }
}
