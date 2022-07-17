<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalIdentity extends Model
{
    use HasFactory;

    protected $fillable = [ 'withdrawal_id' , 'name' , 'number' , 'front' , 'back' , 'selfie' , 'address' , 'status' ];

    public function withdrawal()
    {
        return $this->belongsTo(Withdrawl::class, 'withdrawal_id');
    }
}
