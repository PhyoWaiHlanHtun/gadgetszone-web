<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Purchase;
use App\Models\Advertise;
use App\Models\DigiInvest;
use App\Models\InvestRate;
use App\Models\UserAmount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

function storeImage($img, $folder)
{
    // $fileName= date('YmdHi').$img->getClientOriginalName();
    $fileName = uniqid('gadgets').'.'.$img->extension();
    // $path = $img->storeAs($folder, $fileName, 'public');
    $path = $img->move(public_path('storage/images/'.$folder), $fileName);

    // $path = Storage::disk('s3')->put("discount.com.mm/$folder", $img); // AWS
    return "$folder/".$fileName;
}

function getImage($img)
{
    if ($img) {
        // return Storage::disk('s3')->url($img); // AWS
        return "/storage/images/$img";
    } else {
        return "/default.png";
    }
}


//
function myLevel($user)
{
    // return $user->referral->level_id;
    $data = Group::select('member_id')->where('leader_id', $user->id)->pluck('member_id')->toArray();
    dd($data);
}

function getMembers($user)
{
    return Group::where('leader_id', $user)->get();
}

function getLevelName($id)
{
    return Level::findOrFail($id)->name;
}

function getAlphabets($i)
{
    $data = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

    return $data[$i-1];
}

function dateFormat($date)
{
    return Carbon::parse($date)->format('d-m-Y');
}

function getGroupMembers($leader)
{
    if ($leader) {
        $group = Group::where('leader_id', $leader)->get();
        return (count($group)) ? $group : false;
    } else {
        return false;
    }
}

function getImageFile($img)
{
    return ($img) ? url('/').'/storage/images/'. $img : url('/').'/default.png';
}

function checkExpireDate($user) // for user
{
    if (!$user->amount?->expire_status) {
        if (Carbon::today() > Carbon::parse($user->amount->expire_date)) {
            UserAmount::where('user_id', $user->id)->update([
                'capital' => $user->amount->capital - 100,
                'expire_status' => 1
            ]);
        }
    }

    return User::find($user->id);
}

function checkUsersExpireDate() // for all users
{
    $data = UserAmount::where('expire_status', 0)
                      ->where('expire_date', '<', Carbon::today())
                      ->get();
    
    foreach ($data as $dt) {
        UserAmount::find($dt->id)->update([
            'capital' => $dt->capital - 100,
            'expire_status' => 1
        ]);
    }
}

function checkInvestProfitDate($user) // for user
{
    $invest = DigiInvest::where('user_id', $user->id)->where('status', 1)->whereHas('investRate', function ($query) {
        $query->where('status', 0)->where('expire_date', '<', Carbon::today());
    })->get();
    // ddd($invest);
    foreach ($invest as $i) {
        $investRate = InvestRate::find($i->investRate->id);
        $total = (int)$investRate->invest->amount + (int)$investRate->profit;
        $amount = UserAmount::where('user_id', $user->id)->first();
                
        $total_investment = (int) $amount->investment + $total;
        $amount->update([ 'investment' => $total_investment ]);
        $investRate->update(['status' =>  1]);
    }
}

function checkUsersInvestProfitDate() // for all users
{
    $invest = DigiInvest::where('status', 1)->whereHas('investRate', function ($query) {
        $query->where('status', 0)->where('expire_date', '<', Carbon::today());
    })->get();
    // ddd($invest);
    foreach ($invest as $i) {
        $investRate = InvestRate::find($i->investRate->id);
        $total = (int)$investRate->invest->amount + (int)$investRate->profit;
        $amount = UserAmount::where('user_id', $investRate->invest->user_id)->first();
        
        $total_investment = (int) $amount->investment + $total;
        $amount->update([ 'investment' => $total_investment ]);
        $investRate->update(['status' =>  1]);
    }
}

function getTotalInvestAmount()
{
    return DigiInvest::where('user_id', Auth::id())->where('status', 1)->sum('amount');
}

function getTotalInvestProfitAmount()
{
    $invest = DigiInvest::where('user_id', Auth::id())->where('status', 1)->get();
    $profit = 0;

    foreach ($invest as $inv) {
        if ($inv->investRate?->status) {
            $profit += $inv->investRate?->profit;
        }
    }

    return $profit;
}

function getInitialAmountType($data)
{
    switch ($data->type) {
        case 1:
            return 'click_commission';
            break;
        case 2:
            return 'level_commission';
            break;
        case 3:
            return 'capital';
            break;
        case 4:
            return 'investment';
            break;
        default:
            return 'click_commission';
            break;
            
    }
}

function checkAdvertiseImg()
{
    $data = Advertise::latest()->first();
    return $data ? true : false;
}

function getAdvertiseImg()
{
    $data = Advertise::latest()->first();
    return $data ? $data->image : 'error';
}
