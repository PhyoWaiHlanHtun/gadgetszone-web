<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Withdrawl extends Model
{
    use HasFactory;

    protected $fillable = [ 'amount' , 'bank_id' , 'user_id', 'account' , 'type' , 'status'];

    // type
    // 1 - click commission     // 2 - level commission
    // 3 - capital     // 4 - investment

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function identity()
    {
        return $this->hasOne(WithdrawalIdentity::class, 'withdrawal_id');
    }

    public function getWithdrawlDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-M-Y');
    }

    public function getStatusFormatAttribute()
    {
        if ($this->status == 0) {
            $color = 'warning';
            $status = 'Pending';
        } elseif ($this->status == 1) {
            $color = 'success';
            $status = 'Accepted';
        } else {
            $color = 'danger';
            $status = 'Rejected';
        }
        return
         "<span class='badge bg-$color rounded-pill'> $status </span>"
        ;
    }

    public function getTypeFormatAttribute()
    {
        if ($this->type == 2) {
            $type = "Level Commission";
        } elseif ($this->type == 3) {
            $type = "Capital Amount";
        } elseif ($this->type == 4) {
            $type = "Investment Amount";
        } else {
            $type = "Click Commission";
        }

        return $type;
    }
}
