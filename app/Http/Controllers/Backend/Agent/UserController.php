<?php

namespace App\Http\Controllers\Backend\Agent;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $route = "backend.agent.user.";

    public function __construct()
    {
        $this->middleware("auth:agent");
    }
    
    // User Tree

    public function tree()
    {
        // $users = User::where('agent_id', Auth::id())->get()->filter(function ($user) {
        //     return $user->referral->level_id == 1;
        // });

        // $h = User::where('agent_id', Auth::id())->paginate(1);

        // $users->filter(function ($user) {
        //     return $user->referral->level_id == 1;
        // });

        // $userCollection = $h->getCollection()->filter(function ($user) {
        //     return  $user->referral->level_id == 1;
        // });
        // $users =  $h->setCollection($userCollection);

        $users = User::where('agent_id', Auth::id())->whereHas('referral', function ($query) {
            $query->where('level_id', 1);
        })->paginate(1);
        $levelA = $users[0];
        // return $users;

        $userLists = User::where('tree_leader_id', $users[0]->id)->get();
        $agent = Auth::user()->username;
        return view("backend.agent.user_tree", compact('users', 'agent', 'levelA', 'userLists'));
    }
}
