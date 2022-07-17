<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:adminstaff');
    // }

    public function agent($type, $id)
    {
        $agent = Agent::findOrFail($id);
        
        if ($type == 'agent') {
            $level_A_users = User::where('agent_id', $id)
                                ->whereNull('referral_id')
                                ->pluck('id')
                                ->toArray();

            // return $level_A_users;
    
            $data = User::whereIn('tree_leader_id', $level_A_users)
                    ->orderBy('id', 'desc')
                    ->with('referral', 'member', 'leader')
                    ->get();

        // $data = User::where('agent_id', $id)
            //             ->orderBy('id', 'desc')
            //             ->with('referral', 'member', 'leader')
            //             ->get();
        } else {
            $data = User::orderBy('id', 'desc')
                        ->with('referral', 'member', 'leader')
                        ->get();
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function admin()
    {
        $data = User::orderBy('id', 'desc')
                    ->with('referral', 'member', 'leader', 'agent')
                    ->get();
        
        return response()->json([
            'data' => $data
        ]);
    }
}
