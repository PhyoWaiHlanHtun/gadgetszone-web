<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Topup;
use App\Models\Donation;
use App\Models\Purchase;
use App\Models\Withdrawl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:adminstaff");
    }

    public function dashboard()
    {
        // checkUsersExpireDate();
        
        $today_customers = User::whereDate('created_at', Carbon::today())->whereStatus(1)->count();
        $total_customers = User::whereStatus(1)->count();

        $today_donation_datas = Donation::select('amount')->whereDate('created_at', Carbon::today())->get();
        $total_donation_datas = Donation::select('amount')->get();
        
        $today_topup_datas = Topup::select('amount')->whereDate('created_at', Carbon::today())->whereStatus(1)->get();
        $total_topup_datas = Topup::select('amount')->whereStatus(1)->get();

        $today_withdrawl_datas = Withdrawl::select('amount')->whereDate('created_at', Carbon::today())->whereStatus(1)->get();
        $total_withdrawl_datas = Withdrawl::select('amount')->whereStatus(1)->get();

        $today_purchases = Purchase::whereDate('created_at', Carbon::today())->count();
        $total_purchases = Purchase::all()->count();

        $today_purchase_amount = Purchase::whereDate('created_at', Carbon::today())->get()->sum('price');
        $total_purchase_amount = Purchase::all()->sum('price');

        $today_donations = $this->getTotalAmount($today_donation_datas);
        $total_donations = $this->getTotalAmount($total_donation_datas);

        $today_topups = $this->getTotalAmount($today_topup_datas);
        $total_topups = $this->getTotalAmount($total_topup_datas);

        $today_withdrawls = $this->getTotalAmount($today_withdrawl_datas);
        $total_withdrawls = $this->getTotalAmount($total_withdrawl_datas);
        // dd($today_withdrawls);
        $auth =  Auth::user()->is_admin;

        if ($auth == 1) {
            $file = "admin";
        } elseif ($auth == 2) {
            $file = "accountant";
        } else {
            $file = "staff";
        }
        
        return view(
            "backend.$file.dashboard",
            compact('today_customers', 'total_customers', 'today_donations', 'total_donations', 'today_topups', 'total_topups', 'today_withdrawls', 'total_withdrawls', 'today_purchases', 'total_purchases', 'today_purchase_amount', 'total_purchase_amount')
        );
    }

    public function getTotalAmount($data)
    {
        $total = 0;
    
        foreach ($data as $dt) {
            $total += (float) $dt->amount;
        }

        return $total;
    }
}
