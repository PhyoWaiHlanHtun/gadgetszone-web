<?php

namespace App\Http\Controllers\Api;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function index()
    {
        $data = Agent::select('id', 'username', 'email', 'phone', 'referral', 'status')
                    ->orderBy('id', 'desc')
                    ->get();
        return response()->json([
            'data' => $data
        ]);
    }
}
