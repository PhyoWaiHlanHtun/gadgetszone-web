<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\User;
use App\Models\Withdrawl;
use App\Models\AdminStaff;
use App\Models\UserAmount;
use Illuminate\Http\Request;
use App\Models\WithdrawalIdentity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WithdrawalRequest;
use App\Notifications\WithdrawalNotification;

class WithdrawlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        if (!Auth::user()->identity || Auth::user()->identity->status != 1) {
            return redirect()->route('user.identity.form');
        }

        $data = Withdrawl::where('user_id', Auth::id())->whereDate('created_at', Carbon::today())->first();
        
        if ($data) {
            return redirect('/')->with('warning', '* You can only withdrawal one time per day.');
        }

        $banks = Bank::where('status', 1)->where('type', 1)->get();
        return view("frontend.withdrawal.index", compact('banks'));
    }

    public function store(WithdrawalRequest $request)
    {
        // return $request->all();
        if (!ctype_digit($request->amount)) {
            return back()->with('warning', '* Invalid Amount . Please fill again.')
                            ->withInput($request->input());
        }

        if ($request->amount < 10) {
            return back()->with('warning', '* Minimun withdrawal amount is 10 USDT.')
                    ->withInput($request->input());
        }

        $identity = Auth::user()->identity;

        if (!$identity) {
            return redirect()->route('user.identity.form');
        }

        if ($request->number != $identity->number || $request->name != $identity->name) {
            return back()->with('warning', '* Your ID Name or ID Number is not the same.')
                    ->withInput($request->input());
        }

        $user_amount = UserAmount::where('user_id', Auth::id())->first();

        $capital = ($user_amount->expire_status == 0)
                    ? $user_amount->capital - 100
                    : $user_amount->capital;
        
        if ($request->type == 1 && $user_amount->click_commission < $request->amount) {
            return back()->with('warning', '* Your click commission is not enough for withdrawal .')
                        ->withInput($request->input());
        }

        if ($request->type == 2 && $user_amount->level_commission < $request->amount) {
            return back()->with('warning', '* Your level commission is not enough for withdrawal .')
                        ->withInput($request->input());
        }

        if ($request->type == 3) {
            $user_amount_capital = ($user_amount->expire_status) ?
                                    $user_amount->capital :
                                    $user_amount->capital - 100;

            if ($user_amount_capital < $request->amount) {
                return back()->with('warning', '* Your capital amount is not enough for withdrawal .')
                            ->withInput($request->input());
            }
        }

        if ($request->type == 4 && $user_amount->investment < $request->amount) {
            return back()->with('warning', '* Your investment amount is not enough for withdrawal .')
                        ->withInput($request->input());
        }

        $bank = Bank::findOrFail($request->bank);
        $accountant = AdminStaff::where('is_admin', 2)->first();
        $agent = User::getAgent(Auth::user());

        $withdrawal = Withdrawl::create([
            'user_id' => Auth::id(),
            'bank_id' => $bank->id,
            'amount' => $request->amount,
            'account' => $request->account,
            'type' => $request->type,
        ]);

        WithdrawalIdentity::create([
            'withdrawal_id' => $withdrawal->id,
            'name' => $request->name,
            'number' => $request->number,
            'front' => storeImage($request->file('front'), 'identity'),
            'back' => storeImage($request->file('back'), 'identity'),
            'selfie' => storeImage($request->file('selfie'), 'identity'),
            'address' => $request->address,
        ]);

        if ($agent) {
            $agent->notify(new WithdrawalNotification($withdrawal));
        }
        $accountant->notify(new WithdrawalNotification($withdrawal));

        return redirect('/')->with('success', "* Your withdrawal is successfully done. Please wait admin's approval.");
    }
}
