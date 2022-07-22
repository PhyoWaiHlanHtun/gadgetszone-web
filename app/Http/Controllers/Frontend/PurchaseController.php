<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Products;
use App\Models\Purchase;
use App\Models\UserAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index($id)
    {
        $now = Carbon::now();
        $product = Products::findOrFail($id);
        $user = Auth::user();

        if (!Auth::user()->identity || Auth::user()->identity->status != 1) {
            return redirect()->route('user.identity.form');
        }

        if (!$user->amount) {
            return back()->with('warning', 'You have no capital balance. Please top-up first !');
        }

        if ($user->amount->capital < $product->price) {
            return back()->with('warning', 'Your balance is insufficient!');
        }

        $check = Purchase::where('user_id', Auth::id())
                         ->where('product_id', $id)
                         ->whereDate('created_at', $now)
                         ->count();
        
        if ($check) {
            return back()->with('warning', 'You can not buy this product yet!');
        }
        
        $today_purchases = Purchase::where('user_id', Auth::id())
                                  ->whereDate('created_at', $now)
                                  ->count();
        
        if ($today_purchases >= 20) {
            return back()->with('warning', 'Maximum limit order per day is 20 !');
        }

        $balance = Purchase::whereDate('created_at', $now)
                            ->where('user_id', Auth::id())
                            ->get()
                            ->sum('price');
                
        if (($balance + $product->price) > $user->amount->capital) {
            return back()->with('warning', 'You have exceeded your limit!');
        }

        $commission = $product->price * 0.05 ;

        $purchase = new Purchase();
        $purchase->product_id = $id;
        $purchase->user_id = Auth::id();
        $purchase->price = $product->price;
        $purchase->commission = $commission;
        $purchase->save();

        UserAmount::calculate_click_commission($user->id, $commission);
        UserAmount::calculate_level_commission($purchase, $commission);
        
        return redirect('/')->with('success', 'Product purchase successfully');
    }
}
