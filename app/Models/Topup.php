<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topup extends Model
{
    use HasFactory;

    protected $fillable = [ 'amount' , 'user_id' , 'bank_id' , 'trans_id' , 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function getTopupDateAttribute()
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
}
