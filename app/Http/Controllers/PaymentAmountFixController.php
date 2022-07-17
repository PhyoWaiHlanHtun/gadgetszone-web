<?php

namespace App\Http\Controllers;

use App\Models\Withdrawl;
use Illuminate\Http\Request;

class PaymentAmountFixController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth:adminstaff','isAdmin']);
    // }

    public function withdrawal_error()
    {
        $data = Withdrawl::select('id', 'amount')->where('amount', 'LIKE', '%$%')->get();
        return $data;
    }

    public function withdrawal_fix()
    {
        $data = Withdrawl::select('id', 'amount')->where('amount', 'LIKE', '%$%')->get();
        
        foreach ($data as $dt) {
            $num = preg_replace('/[^0-9]/', '', $dt->amount);
            Withdrawl::findOrFail($dt->id)->update([
                'amount' => $num
            ]);
        }
    }
}
