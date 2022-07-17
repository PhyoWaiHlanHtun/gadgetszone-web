<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Agent;
use App\Models\Topup;
use App\Models\Donation;
use App\Models\Purchase;
use App\Models\Withdrawl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileEditRequest;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:agent");
    }

    public function dashboard()
    {
        $user = Auth::user();
        
        if ($user->status) {
            $today_customers = User::where('agent_id', Auth::id())->whereDate('created_at', Carbon::today())->whereStatus(1)->count();
            $total_customers = User::where('agent_id', Auth::id())->whereStatus(1)->count();

            $today_donations = Donation::whereDate('created_at', Carbon::today())->get()->sum('amount');
            $total_donations = Donation::all()->sum('amount');
        
            $today_topups = Topup::whereDate('created_at', Carbon::today())->whereStatus(1)->get()->filter(function ($value, $key) {
                return $value->user?->agent_id == Auth::id();
            })->sum('amount');

            $total_topups = Topup::whereStatus(1)->get()->filter(function ($value) {
                return $value->user?->agent_id == Auth::id();
            })->sum('amount');

            $today_withdrawls = Withdrawl::whereDate('created_at', Carbon::today())->whereStatus(1)->get()->filter(function ($value, $key) {
                return $value->user?->agent_id == Auth::id();
            })->sum('amount');
            $total_withdrawls = Withdrawl::whereStatus(1)->get()->filter(function ($value, $key) {
                return $value->user?->agent_id == Auth::id();
            })->sum('amount');

            $today_purchases = Purchase::whereDate('created_at', Carbon::today())->get()->filter(function ($value, $key) {
                return $value->user?->agent_id == Auth::id();
            })->count();
            $total_purchases = Purchase::all()->filter(function ($value, $key) {
                return $value->user?->agent_id == Auth::id();
            })->count();

            $today_purchase_amount = Purchase::whereDate('created_at', Carbon::today())->get()->filter(function ($value, $key) {
                return $value->user?->agent_id == Auth::id();
            })->sum('price');
            $total_purchase_amount = Purchase::all()->filter(function ($value, $key) {
                return $value->user?->agent_id == Auth::id();
            })->sum('price');
        
            return view(
                "backend.agent.dashboard",
                compact('today_customers', 'total_customers', 'today_donations', 'total_donations', 'today_topups', 'total_topups', 'today_withdrawls', 'total_withdrawls', 'today_purchases', 'total_purchases', 'today_purchase_amount', 'total_purchase_amount')
            );
        } else {
            Auth::logout();
            return redirect()->route('agent.login')->with('error', '* Your account is inactive. Please contact to admin.');
        }
    }

    public function update(ProfileEditRequest $request)
    {
        // return $request->all();
        
        $agent = Agent::findOrFail(Auth::id());

        $agent->update([
            'username' => $request->username,
            // 'email' => $request->email,
            'phone' => $request->phone
        ]);

        if ($request->password) {
            $agent->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('agent.dashboard')->with('success', 'Successfully Updated');
    }
}
