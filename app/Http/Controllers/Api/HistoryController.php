<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TopupResource;
use App\Http\Resources\InvestmentResource;
use App\Http\Resources\WithdrawalResource;

class HistoryController extends Controller
{
    public function topup()
    {
        $user = User::findOrFail(Auth::id());
        
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' =>  new TopupResource($user),
        ]);
    }

    public function withdrawal()
    {
        $user = User::findOrFail(Auth::id());
        
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' =>  new WithdrawalResource($user),
        ]);
    }

    public function investment()
    {
        $user = User::findOrFail(Auth::id());
        
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' =>  new InvestmentResource($user),
        ]);
    }

    public function purchase()
    {
        // return User::findOrFail(Auth::id());
        // pangination may need
        $purchases = Purchase::where('user_id', Auth::id())->get();

        $data = [];

        foreach ($purchases as $purchase) {
            $data[] = [
                'id' => $purchase->id,
                'name' => $purchase->product->name,
                'category' => $purchase->product->category->name,
                'price' => $purchase->product->price,
                'date' => dateFormat($purchase->created_at),
            ];
        }

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' =>  $data
        ]);
    }

    public function today_purchase()
    {
        // return User::findOrFail(Auth::id());
        
        $purchases = Purchase::where('user_id', Auth::id())
                                ->whereDate('created_at', Carbon::today())
                                ->get();

        $data = [];

        foreach ($purchases as $purchase) {
            $data[] = [
                'id' => $purchase->id,
                'name' => $purchase->product->name,
                'category' => $purchase->product->category->name,
                'price' => $purchase->product->price
            ];
        }

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' =>  $data
        ]);
    }

    public function today_purchase_count()
    {
        // return User::findOrFail(Auth::id());
        
        $count = Purchase::where('user_id', Auth::id())
                                ->whereDate('created_at', Carbon::today())
                                ->count();

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' =>  $count
        ]);
    }
}
