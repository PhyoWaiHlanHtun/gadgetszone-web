<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\Withdrawl;
use App\Models\UserAmount;
use Illuminate\Http\Request;
use App\Models\WithdrawalIdentity;
use App\Http\Controllers\Controller;

class WithdrawlController extends Controller
{
    protected $route = "backend.admin.withdrawal.";

    public function __construct()
    {
        $this->middleware("auth:adminstaff");
    }

    public function pending()
    {
        $type_lang = config('app.locale') == 'ch' ? '待办的' : 'Pending';
        $type = 'pending';
        return view("{$this->route}index", compact('type', 'type_lang'));
    }

    public function history()
    {
        $type_lang = config('app.locale') == 'ch' ? '历史' : 'History';
        $type = 'history';
        return view("{$this->route}index", compact('type', 'type_lang'));
    }

    public function change($status, $id)
    {
        $withdrawal = Withdrawl::findOrFail($id);
        $user = UserAmount::where('user_id', $withdrawal->user_id)->first();
        
        if ($status == 'accept') {
            $type = getInitialAmountType($withdrawal);
            $initial_amount = $user->$type;
            // dd($user->$type);
            if ((int) $initial_amount < (int) $withdrawal->amount) {
                return back()->with('warning', '* invalid  withdrawal.');
            } else {
                $withdrawal->update([ 'status' => 1 ]);
                if ($status == 'accept') {
                    $user->update([
                        $type => $initial_amount - $withdrawal->amount
                    ]);
                }
            }
        } else {
            $withdrawal->update([ 'status' => 2 ]);
        }
        return redirect()->route('withdrawal.pending')->with('success', '* Successfully Done');
    }
    

    // Withdrawal Identity

    public function identity($id)
    {
        $data = WithdrawalIdentity::findOrFail($id);
        $user = $data->withdrawal->user;
        return view('backend.admin.withdrawal.identity', compact('user', 'data'));
    }
}
