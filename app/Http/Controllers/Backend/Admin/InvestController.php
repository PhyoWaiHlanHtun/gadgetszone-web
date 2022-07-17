<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\DigiInvest;
use App\Models\UserAmount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvestController extends Controller
{
    protected $route = "backend.admin.invest.";

    public function __construct()
    {
        $this->middleware("auth:adminstaff");
    }

    public function pending()
    {
        $type = 'pending';
        return view("{$this->route}index", compact('type'));
    }

    public function history()
    {
        $type = 'history';
        return view("{$this->route}index", compact('type'));
    }

    public function change($status, $id)
    {
        $invest = DigiInvest::findOrFail($id);
        $update = $invest->update([ 'status' => ($status == 'accept') ? 1 : 2 ]);

        if ($update) {
            $user = User::findOrFail($invest->user_id);
            UserAmount::calculate_capital($user->id, $invest->amount);
        }
        return back()->with('success', '* Successfully Done');
    }
}
