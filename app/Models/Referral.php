<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [ 'code' , 'user_id' , 'level_id' ];

    public static function generateReferralCode()
    {
        return static::checkReferralCode(Str::random(10));
    }

    public static function checkReferralCode($code)
    {
        $referral = Referral::whereCode($code)->count();
        $agentReferral = Agent::whereReferral($code)->count();
    
        if ($referral >  0 || $agentReferral > 0) {
            generateReferralCode();
        } else {
            return $code;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public static function add($user, $level)
    {
        Referral::create([
            'code' => Referral::generateReferralCode(), // random generate
            'user_id' => $user,
            'level_id' => $level
        ]);
    }
}
