<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\Topup;
use App\Models\UserAmount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TopupController extends Controller
{
    protected $route = "backend.admin.topup.";

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
        $type_lang = config('app.locale') == 'ch' ? '待办的' : 'Pending';
        $type = 'history';
        return view("{$this->route}index", compact('type', 'type_lang'));
    }

    public function change($status, $id)
    {
        $topup = Topup::findOrFail($id);
        $update = $topup->update([ 'status' => ($status == 'accept') ? 1 : 2 ]);
        
        if ($status == 'accept') {
            $user = User::findOrFail($topup->user_id);
            UserAmount::calculate_capital($user->id, $topup->amount);
        }
        return back()->with('success', '* Successfully Done');
    }
}
