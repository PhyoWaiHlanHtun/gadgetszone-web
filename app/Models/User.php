<?php

namespace App\Models;

use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'phone',
        'password',
        'referral_id',
        'balance',
        'commission',
        'status',
        'agent_id',
        'tree_leader_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function referral()
    {
        return $this->hasOne(Referral::class)->with('level');
    }

    public function leader()
    {
        return $this->hasMany(Group::class, 'leader_id');
    }

    public function member()
    {
        return $this->hasOne(Group::class, 'member_id');
    }

    public function members()
    {
        return $this->hasMany(Group::class, 'leader_id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function amount()
    {
        return $this->hasOne(UserAmount::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawl::class, 'user_id');
    }

    public function topups()
    {
        return $this->hasMany(Topup::class, 'user_id');
    }

    public function investments()
    {
        return $this->hasMany(DigiInvest::class, 'user_id');
    }

    public function treeLeader()
    {
        return $this->belongsTo(User::class, 'tree_leader_id');
    }

    public function identity()
    {
        return $this->hasOne(UserIdentity::class, 'user_id');
    }

    public function getLeaderLevelAttribute()
    {
        return $this->getLevelName($this->referral->level->id - 1) ;
    }

    public function getMemberLevel($user)
    {
        return $user->referral->level->id + 1 ;
    }

    public function getMemberLevelAttribute()
    {
        return $this->getLevelName($this->referral->level->id + 1);
    }

    public function getLevelName($level)
    {
        $level = Level::find($level);
        return ($level) ? $level->name : '';
    }

    public function getGroupALeader()
    {
        $levelLimit = $this->referral->level_id;
        $member_id = $this->id;
        $array = [];

        for ($i=1; $i <= $levelLimit ; $i++) {
            $group = Group::where('member_id', $member_id)->first();

            if (isset($group->leader)) {
                $array[] = $group->leader->id;
                $member_id = $group->leader_id;
            }
        }
        $group_owner = User::find(end($array));
        return $group_owner;
    }

    public function getGroupMembers($members)
    {
        $arr = [];
        if ($members) {
            foreach ($members as $member) {
                $arr[] = $member->member_id;
            }
            $group = Group::whereIn('leader_id', $arr)->get();
            return (count($group)) ? $group : false;
        } else {
            return false;
        }
    }

    public static function add($request)
    {
        return User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => bcrypt($request->password),
                    'status' => 1
                ]);
    }
            
    public static function getGroupALeaderId($referral)
    {
        $levelLimit = $referral->level_id;
        $member_id = $referral->user_id;
        $array = [];
        // return $member_id;
        for ($i=1; $i <= $levelLimit ; $i++) {
            $group = Group::where('member_id', $member_id)->first();

            if (isset($group->leader)) {
                $array[] = $group->leader->id;
                $member_id = $group->leader_id;
            }
        }
                
        $group_owner = User::find(end($array));
        
        if ($group_owner) {
            return $group_owner->id;
        } else {
            return $member_id;
        }
    }

    public static function getAgent($user)
    {
        $leader = User::getGroupALeaderId($user->referral);
        return User::find($leader)->agent;
    }

    public function getCreatedAtAttribute($value)
    {
        // return Carbon::parse($value);
        $time = Carbon::parse($value)->addHours(1);
        return $time->format('d-M-Y H:i');
    }

    public function getStatusFormatAttribute()
    {
        $color = $this->status == 1 ? "success" : "warning";
        $status = $this->status == 1 ? "Active" : "Inactive";
      
        return
         "<span class='badge bg-$color rounded-pill'> $status </span>"
        ;
    }

    public function getAmountFormat($type)
    {
        return $type ? "$". $type : '$ 0';
    }
}
