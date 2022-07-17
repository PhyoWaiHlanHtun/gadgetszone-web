<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkAuth($agent, $user)
    {
        if (Auth::guard('adminstaff')->check()) {
            return true;
        }

        if (Auth::guard('agent')->check()) {
            if ($user->agent_id) {
                return $agent->id == $user->agent_id;
            } else {
                return $agent->id == $user->treeLeader->agent_id;
            }
        }
    }
}
