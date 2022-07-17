<?php

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use App\Models\User;
use App\Models\Topup;
use App\Models\Donation;
use App\Models\Withdrawl;
use App\Models\AdminStaff;
use App\Models\DigiInvest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TopupNotification;
use App\Notifications\InvestmentNotification;
use App\Notifications\WithdrawalNotification;

class PaymentController extends Controller
{
    public function types($type)
    {
        // type 1 - Topup & Withdrawal , type 2 - Investment , type 3 - Donations
        $banks = Bank::select('id', 'name', 'account', 'phone', 'image')
                    ->where('status', 1)
                    ->where('type', $type)
                    ->orderBy('id', 'desc')
                    ->get();

        $data = [];

        foreach ($banks as $bank) {
            $data[] = [
                'id' => $bank->id,
                'name' => $bank->name,
                'account' => $bank->account,
                'phone' => $bank->phone,
                'image' => $bank->image ? url('/').'/storage/images/'.$bank->image : url('/').'/default.png',
            ];
        }

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' =>  $data
        ]);
    }

    public function topup(Request $request)
    {
        // return $request->all();
        $bank = Bank::find($request->bank_id);
        $accountant = AdminStaff::where('is_admin', 2)->first();
        $agent = User::getAgent(Auth::user());

        if (!$bank) {
            return response()->json([
                'status' => 404,
                'message' => "Payment type is not found. Please try again.",
            ]);
        }

        if (!$request->amount || !$request->image) {
            return response()->json([
                'status' => 404,
                'message' => "Validation Fail",
            ]);
        }

        $topup = Topup::create([
                    'amount' => $request->amount,
                    'bank_id' => $request->bank_id,
                    'user_id' => Auth::id(),
                    'trans_id' => storeImage($request->file('image'), 'transaction')
                ]);

        if ($agent) {
            $agent->notify(new TopupNotification($topup));
        }
        $accountant->notify(new TopupNotification($topup));

        return response()->json([
            'status' => 200,
            'message' => "Your topup is successfully done.Please wait admin's approval",
        ]);
    }

    public function withdrawal(Request $request)
    {
        // return $request->all();
        $bank = Bank::find($request->bank_id);
        $accountant = AdminStaff::where('is_admin', 2)->first();
        $agent = User::getAgent(Auth::user());

        if (!$request->amount || !$request->account) {
            return response()->json([
                'status' => 404,
                'message' => "Validation Fail",
            ]);
        }

        if (!$bank) {
            return response()->json([
                'status' => 404,
                'message' => "Payment type is not found. Please try again.",
            ]);
        }

        $withdrawal = Withdrawl::create([
            'amount' => $request->amount,
            'account' => $request->account,
            'bank_id' => $request->bank_id,
            'user_id' => Auth::id(),
        ]);

        if ($agent) {
            $agent->notify(new WithdrawalNotification($withdrawal));
        }
        $accountant->notify(new WithdrawalNotification($withdrawal));

        return response()->json([
            'status' => 200,
            'message' => "Your withdrawal is successfully done.Please wait admin's approval",
        ]);
    }

    public function donation(Request $request)
    {
        // return $request->all();
        $bank = Bank::find($request->bank_id);

        if (!$bank) {
            return response()->json([
                'status' => 404,
                'message' => "Payment type is not found. Please try again.",
            ]);
        }

        if (!$request->amount || !$request->image) {
            return response()->json([
                'status' => 404,
                'message' => "Validation Fail",
            ]);
        }

        Donation::create([
            'amount' => $request->amount,
            'bank_id' => $request->bank_id,
            'trans_id' => storeImage($request->file('image'), 'transaction')
        ]);

        return response()->json([
            'status' => 200,
            'message' => "Thanks for donation.",
        ]);
    }

    public function investment(Request $request)
    {
        // return $request->all();
        $bank = Bank::find($request->bank_id);
        $accountant = AdminStaff::where('is_admin', 2)->first();
        $agent = User::getAgent(Auth::user());
        
        if (!$bank) {
            return response()->json([
                'status' => 404,
                'message' => "Payment type is not found. Please try again.",
            ]);
        }

        if (!$request->amount || !$request->image) {
            return response()->json([
                'status' => 404,
                'message' => "Validation Fail",
            ]);
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

        $investment = DigiInvest::create([
                        'amount' => $request->amount,
                        'bank_id' => $request->bank_id,
                        'user_id' => Auth::id(),
                        'plan' => $plan,
                        'trans_id' => storeImage($request->file('image'), 'transaction')
                    ]);

        if ($agent) {
            $agent->notify(new InvestmentNotification($investment));
        }
        $accountant->notify(new InvestmentNotification($investment));

        return response()->json([
            'status' => 200,
            'message' => "Your investment is successfully done.Please wait admin's approval",
        ]);
    }
}
