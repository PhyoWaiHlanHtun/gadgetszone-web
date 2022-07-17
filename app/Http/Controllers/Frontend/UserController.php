<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Topup;
use App\Models\Donation;
use App\Models\Purchase;
use App\Models\Withdrawl;
use App\Models\DigiInvest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileEditRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:user");
    }

    public function dashboard()
    {
        $user = Auth::user();
        $user = checkExpireDate(Auth::user());
        $profit = checkInvestProfitDate(Auth::user());
        $todayPurchase = Purchase::where('user_id', $user->id)->whereDate('created_at', Carbon::today())->paginate(15);
        $purchaseHistory = Purchase::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(15);
        $topupHistory = Topup::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(15);
        $withdrawlHistory = Withdrawl::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(15);
        $levels = Level::all();
        $investment = DigiInvest::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(15);
        $donations = Donation::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(15);
                
        if ($user->status) {
            return view("frontend.user.dashboard", compact('user', 'todayPurchase', 'purchaseHistory', 'topupHistory', 'withdrawlHistory', 'levels', 'investment', 'donations'));
        } else {
            Auth::logout();
            return redirect()->route('user.login')->with('error', '* Your account is inactive. Please contact to admin.');
        }
    }

    public function topup_fetch(Request $request)
    {
        if ($request->ajax()) {
            $topupHistory = Topup::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(15);
            return view('frontend.user.table.topup', compact('topupHistory'))->render();
        }
    }

    public function withdrawl_fetch(Request $request)
    {
        if ($request->ajax()) {
            $withdrawlHistory = Withdrawl::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(15);
            return view('frontend.user.table.withdrawal', compact('withdrawlHistory'))->render();
        }
    }

    public function purchase_today_fetch(Request $request)
    {
        if ($request->ajax()) {
            $todayPurchase = Purchase::where('user_id', Auth::id())->whereDate('created_at', Carbon::today())->paginate(15);
            return view('frontend.user.table.purchaseToday', compact('todayPurchase'))->render();
        }
    }

    public function purchase_history_fetch(Request $request)
    {
        if ($request->ajax()) {
            $purchaseHistory = Purchase::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(15);
            return view('frontend.user.table.purchaseHistory', compact('purchaseHistory'))->render();
        }
    }

    public function investment_fetch(Request $request)
    {
        if ($request->ajax()) {
            $investment = DigiInvest::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(15);
            return view('frontend.user.table.investment', compact('investment'))->render();
        }
    }

    public function donations_fetch(Request $request)
    {
        if ($request->ajax()) {
            $donations = Donation::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(15);
            return view('frontend.user.table.donations', compact('donations'))->render();
        }
    }

    public function update(ProfileEditRequest $request)
    {
        // return $request->all();

        $user = User::findOrFail(Auth::id());

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

        return redirect()->route('user.dashboard')->with('success', 'Successfully Updated');
    }

    public function test($user)
    {
        return Group::where('leader_id', $user)->get();
    }
}
