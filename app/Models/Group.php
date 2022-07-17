<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['leader_id' , 'member_id'];

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_id');
    }

    public static function add($leader, $member)
    {
        Group::create([
            'leader_id' => $leader ,
            'member_id' => $member
        ]);
    }
}
