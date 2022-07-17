<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Bank;
use App\Models\Donation;
use App\Models\UserAmount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    
    public function donate()
    {
        if (!Auth::user()->identity || Auth::user()->identity->status != 1) {
            return redirect()->route('user.identity.form');
        }

        $bank = Bank::where('status', 1)->where('type', 3)->get();
        return view('frontend.donate.index', compact('bank'));
    }

    public function payment(Request $request)
    {
        if (!Auth::user()->identity || Auth::user()->identity->status != 1) {
            return redirect()->route('user.identity.form');
        }

        $amount = $request->amount;

        if ($request->type == 0) {
            $bank = "custom";
        } else {
            $bank = Bank::whereId($request->type)->where('type', 3)->first();
            if (!$bank) {
                abort(404);
            }
        }

        if (!ctype_digit($amount)) {
            // abort(404);
            return back()->with('warning', '* Invalid Amount . Please fill again.')->withInput($request->input());
        }

        return view("frontend.donate.payment", compact('amount', 'bank'));
    }

    public function payment_store(Request $request)
    {
        // return $request->all();
        if (!Auth::user()->identity || Auth::user()->identity->status != 1) {
            return redirect()->route('user.identity.form');
        }

        if (!ctype_digit($request->amount)) {
            // abort(404);
            return back()->with('warning', '* Invalid Amount . Please fill again.')->withInput($request->input());
        }

        if ($request->bank) {
            Bank::findOrFail($request->bank);
            
            $this->validate($request, [
                'image' => 'required|mimes:jpg,jpen,png,gif|max:5000',
            ]);

            $type = 0;
            $img = storeImage($request->file('image'), 'transaction');
        } else {
            $type = 1;
            $user_amount = UserAmount::where('user_id', Auth::id())->first();
            
            if ($user_amount->status == 1) {
                return back()->with('warning', '* Please Topup First.');
            }

            $capital = ($user_amount->expire_status == 0)
                        ? $user_amount->capital - 100
                        : $user_amount->capital;
            
            if ($capital < $request->amount) {
                return back()->with('warning', '* Your capital amount is not enough for donation . Please topup first.');
            }
                
            $user_amount->update([ 'capital' => $user_amount->capital - $request->amount ]);
            $img = null;
        }

        Donation::create([
            'bank_id' => $request->bank,
            'amount' => $request->amount,
            'user_id' => Auth::id(),
            'type' => $type,
            'trans_id' => $img
        ]);

        return back()->with('success', "* Thanks For Your Donation.");
    }
}
