<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAmount extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id' , 'capital' , 'click_commission', 'level_commission', 'investment', 'total' , 'status' , 'expire_date' , 'expire_status'];

    public static function calculate_capital($user_id, $topup)
    {
        $useramount = UserAmount::where('user_id', $user_id)->first();
        $old_capital = ($useramount) ? $useramount->capital : 0 ;
        UserAmount::updateOrCreate(
            [ 'user_id' => $user_id ],
            [ 'capital' => $old_capital + $topup , 'status' => 0 ]
        );
    }

    public static function calculate_click_commission($user_id, $commission)
    {
        $useramount = UserAmount::where('user_id', $user_id)->first();
        $click_commission = ($useramount) ? $useramount->click_commission : 0 ;
        UserAmount::updateOrCreate(
            [ 'user_id' => $user_id ],
            [ 'click_commission' => $click_commission + $commission ]
        );
    }

    public static function calculate_level_commission($purchase, $commission)
    {
        $levelLimit = $purchase->user->referral->level_id;
        $member_id = $purchase->user->id;
        
        for ($i=1; $i < $levelLimit ; $i++) {
            $leader =  Group::where('member_id', $member_id)->first()->leader;
            $level = $leader->referral->level;
            
            if ($i == 1) {
                $commission_rate = 0.12;
            } elseif ($i == 2) {
                $commission_rate = 0.08;
            } elseif ($i == 3) {
                $commission_rate = 0.04;
            } else {
                $commission_rate = 0.01;
            }

            $member_id = $leader->id;

            $old_commission = ($leader->amount && $leader->amount->level_commission) ? $leader->amount->level_commission : 0;

            UserAmount::updateOrCreate(
                [ 'user_id' => $leader->id ],
                [ 'level_commission' => $old_commission + ($commission_rate * $commission) ]
            );
        }
    }

    public static function add($user)
    {
        UserAmount::create([
            'capital' => 100,
            'user_id' => $user,
            'expire_date' => Carbon::now()->addDays(3),
        ]);
    }

    public function getTotalAttribute()
    {
        return $this->capital + $this->click_commission + $this->level_commission;
    }
}
