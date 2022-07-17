<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use App\Models\BonusFine;
use App\Models\UserAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class BonusFineController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:adminstaff','isAdmin']);
    }

    protected $route = "backend.admin.bonus_fine.";
    
    public function index()
    {
        $data = User::where('status', 1)->latest()->get();
        return view("{$this->route}.index", compact('data'));
    }

    public function create(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user_amount = UserAmount::where('user_id', $user->id)->first();
        $type = getInitialAmountType($request);
        $initial_amount = $user_amount->$type;
        
        if ($request->status == 1) {
            $total = (int) $initial_amount + (int) $request->amount; // Bonus
        } else {
            $total = (int) $initial_amount - (int) $request->amount; // Fine
        }

        // dd($total);

        $user_amount->update([ $type => $total ]);

        BonusFine::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'type' => $request->type,
            'status' => $request->status
        ]);

        return back()->with('success', ' * Successfully Done');
    }

    // Lists
    public function bonus_lists()
    {
        $users = BonusFine::where('status', 1)->distinct('user_id')->pluck('user_id');
        $data = User::whereIn('id', $users)->orderBy('id', 'desc')->get();
        $title = Lang::locale() ?  '奖金清单' : 'Bonus Lists';
        return view("{$this->route}.list", compact('data', 'title'));
    }

    public function fine_lists()
    {
        $users = BonusFine::where('status', 2)->distinct('user_id')->pluck('user_id');
        $data = User::whereIn('id', $users)->orderBy('id', 'desc')->get();
        $title = Lang::locale() ?  '精美清单' : 'Fine Lists';
        return view("{$this->route}.list", compact('data', 'title'));
    }

    // History
    public function bonus_history()
    {
        $data = BonusFine::where('status', 1)->latest()->get();
        $title = Lang::locale() ?  '奖金历史' : 'Bonus History';
        return view("{$this->route}.history", compact('data', 'title'));
    }

    public function fine_history()
    {
        $data = BonusFine::where('status', 2)->latest()->get();
        $title = Lang::locale() ?  '美好的历史' : 'Fine History';
        return view("{$this->route}.history", compact('data', 'title'));
    }
}
