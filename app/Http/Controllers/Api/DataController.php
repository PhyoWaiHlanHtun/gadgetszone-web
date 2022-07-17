<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Bank;
use App\Models\Level;
use App\Models\Topup;
use App\Models\Donation;
use App\Models\Purchase;
use App\Models\Referral;
use App\Models\Withdrawl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DigiInvest;

class DataController extends Controller
{
    public function levels()
    {
        $data = Level::select('id', 'name', 'commission')
                    ->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function referrals()
    {
        $data = Referral::select('id', 'code', 'user_id', 'level_id')
                    ->orderBy('id', 'desc')
                    ->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function banks()
    {
        $data = Bank::select('id', 'name', 'account', 'phone', 'image', 'type')
                    ->where('status', 1)
                    ->orderBy('id', 'desc')
                    ->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function bank_image($id)
    {
        $data = Bank::findOrFail($id);

        $oldImages[] = [
            'id' => 1,
            'src' => getImage($data->image)
        ];
        return response()->json($oldImages);
    }

    public function topup($type)
    {
        // return Carbon::today();
        if ($type == 'pending') {
            $data = Topup::where('status', 0)
                        ->orderBy('id', 'desc')
                        ->with('user', 'bank')
                        ->get();
        } else {
            $data = Topup::where('status', '!=', 0)
                        ->orderBy('id', 'desc')
                        ->with('user', 'bank')
                        ->get();
        }

        // return $data[0]->topup_date;

        return response()->json([
            'data' => $data
        ]);
    }

    public function invest($type)
    {
        // return Carbon::today();
        if ($type == 'pending') {
            $data = DigiInvest::where('status', 0)
                        ->orderBy('id', 'desc')
                        ->with('user', 'bank')
                        ->get();
        } else {
            $data = DigiInvest::where('status', '!=', 0)
                        ->orderBy('id', 'desc')
                        ->with('user', 'bank')
                        ->get();
        }

        // return $data[0]->topup_date;

        return response()->json([
            'data' => $data
        ]);
    }

    public function withdrawal($type)
    {
        // return Carbon::today();
        if ($type == 'pending') {
            $data = Withdrawl::where('status', 0)
                        ->orderBy('id', 'desc')
                        ->with('user', 'bank', 'identity')
                        ->get();
        } else {
            $data = Withdrawl::where('status', '!=', 0)
                        ->orderBy('id', 'desc')
                        ->with('user', 'bank', 'identity')
                        ->get();
        }

        // return $data[0]->topup_date;

        return response()->json([
            'data' => $data
        ]);
    }

    public function donations()
    {
        $data = Donation::orderBy('id', 'desc')->with('bank', 'user')->get();
        return response()->json([
            'data' => $data
        ]);
    }

    // public function topup_history()
    // {
    //     $data = Topup::orderBy('id', 'desc')->get();
    //     return response()->json([
    //         'data' => $data
    //     ]);
    // }

    public function purchases()
    {
        $data = Purchase::orderBy('id', 'desc')->with('user', 'product')->get();
        return response()->json([
            'data' => $data
        ]);
    }
}
