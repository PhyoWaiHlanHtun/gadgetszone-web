<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [ 'amount' , 'user_id' , 'bank_id' , 'trans_id' , 'status', 'type'];

    // type - 0 - Bank Transaction
    // type - 1 - Transfer from capital amount
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
