<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\User;
use App\Models\AdminStaff;
use App\Models\DigiInvest;
use App\Models\InvestRate;
use App\Models\UserAmount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InvestmentNotification;

class InvestController extends Controller
{
    protected $plans = [ 1,2,3 ];

    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function diginvestShow($plan)
    {
        if (!Auth::user()->identity || Auth::user()->identity->status != 1) {
            return redirect()->route('user.identity.form');
        }
        if (!in_array($plan, $this->plans)) {
            abort(404);
        }
        $bank = Bank::where('status', 1)->where('type', 2)->get();
        return view('frontend.diginvest-show', compact('bank', 'plan'));
    }

    public function showForm(Request $request)
    {
        // return $request->all();
        if (!Auth::user()->identity || Auth::user()->identity->status != 1) {
            return redirect()->route('user.identity.form');
        }
        $amount = $request->amount;
        $plan = $request->plan;
        
        if (!ctype_digit($amount) || !ctype_digit($plan) || ! in_array($plan, $this->plans)) {
            abort(404);
        }

        if ($request->type == 0) {
            $bank = "custom";
        } else {
            $bank = Bank::whereId($request->type)->where('type', 2)->first();
            if (!$bank) {
                abort(404);
            }
        }
        
        return view('frontend.digivest-form', compact('amount', 'bank', 'plan'));
    }

    public function diginvestForm(Request $request)
    {
        // return $request->all();
        // $bank = Bank::findOrFail($request->bank);
        if (!Auth::user()->identity || Auth::user()->identity->status != 1) {
            return redirect()->route('user.identity.form');
        }
        
        if (!ctype_digit($request->amount) || !ctype_digit($request->plan) || !in_array($request->plan, $this->plans)) {
            abort(404);
        }

        switch ($request->plan) {
            case 1:
                $plan = 'Digiexpress Return Collective Asset Management Plan';
                break;
            case 2:
                $plan = 'Digiexpress Deposit Management Plan';
                break;
            case 3:
                $plan = 'Digiexpress eco growth Management Plan';
                break;
            default:
                $plan = '';
                break;
        }

        if ($request->bank) {
            Bank::findOrFail($request->bank);
            
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpen,png,gif|max:5000',
            ]);
            $type = 0;
            $status = 0;
            $img = storeImage($request->file('image'), 'transaction');
        } else {
            $type = 1;
            $status = 1;
            $img = null;
            $user_amount = UserAmount::where('user_id', Auth::id())->first();
            
            if ($user_amount->status == 1) {
                return back()->with('warning', '* Please Topup First.');
            }

            $capital = ($user_amount->expire_status == 0)
                        ? $user_amount->capital - 100
                        : $user_amount->capital;
            
            if ($capital < $request->amount) {
                return back()->with('warning', '* Your capital amount is not enough for investment.');
            }
                            
            $user_amount->update([ 'capital' => $user_amount->capital - $request->amount ]);
        }
        
        $investment = DigiInvest::create([
                        'bank_id' => $request->bank,
                        'user_id' => Auth::id(),
                        'amount' => $request->amount,
                        'plan' => $plan,
                        'type' => $type,
                        'status' => $status,
                        'trans_id' => $img
                    ]);

        if ($request->plan == 1) {
            $rate = ($request->period == 30) ? 0.01  : ($request->period == 60 ?  0.02  : 0.03) ;
        } elseif ($request->plan == 2) {
            $rate = 0.03;
        } else {
            $rate = ($request->period == 30) ? 0.01  : ($request->period == 60 ?  0.02  : 0.03) ;
        }

        // return $rate;

        $investRate = InvestRate::create([
            'invest_id' => $investment->id,
            'plan' => $request->plan,
            'rate' => $rate,
            'profit' => $request->amount * $rate ,
            'period' => $request->period,
            'expire_date' => Carbon::now()->addDays($request->period)
        ]);

        $accountant = AdminStaff::where('is_admin', 2)->first();
        $agent = User::getAgent(Auth::user());

        if ($agent) {
            $agent->notify(new InvestmentNotification($investment));
        }
        $accountant->notify(new InvestmentNotification($investment));

        return back()->with('success', "* Thanks For Your Investment.");
    }
}
