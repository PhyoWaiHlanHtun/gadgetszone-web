<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Bank;
use App\Models\User;
use App\Models\Topup;
use App\Models\AdminStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TopupNotification;

class TopupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $bank = Bank::where('status', 1)->where('type', 1)->get();
        return view("frontend.topup.index", compact('bank'));
    }

    public function payment(Request $request)
    {
        $amount = $request->amount;

        if (!ctype_digit($amount)) {
            // abort(404);
            return back()->with('warning', '* Invalid Amount . Please fill again.')->withInput($request->input());
        }
                
        $bank = Bank::whereId($request->type)->where('type', 1)->first();
        if (!$bank) {
            abort(404);
        }
        
        return view("frontend.topup.payment", compact('amount', 'bank'));
    }

    public function payment_store(Request $request)
    {
        // return $request->all();

        // dd($request->all());
        
        if (!ctype_digit($request->amount)) {
            // abort(404);
            return back()->with('warning', '* Invalid Amount . Please fill again.')->withInput($request->input());
        }

        $this->validate($request, [
            'image' => 'required|mimes:jpg,jpen,png,gif|max:5000',
        ]);
        
        $bank = Bank::findOrFail($request->bank);
        $accountant = AdminStaff::where('is_admin', 2)->first();
        $agent = User::getAgent(Auth::user());

        $topup = Topup::create([
                    'user_id' => Auth::id(),
                    'bank_id' => $request->bank,
                    'amount' => $request->amount,
                    'trans_id' => storeImage($request->file('image'), 'transaction')
                ]);

        if ($agent) {
            $agent->notify(new TopupNotification($topup));
        }
        $accountant->notify(new TopupNotification($topup));
        
        return back()->with('success', "* Your topup is successfully done. Please wait admin's approval.");
    }
}
