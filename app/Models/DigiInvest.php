<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DigiInvest extends Model
{
    use HasFactory;

    protected $fillable = [ 'amount', 'plan' , 'user_id' , 'bank_id' , 'trans_id' , 'status' , 'type'];

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

    public function investRate()
    {
        return $this->hasOne(InvestRate::class, 'invest_id');
    }

    public function getInvestmentDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-M-Y');
    }

    public function getProfitDateAttribute()
    {
        if ($this->investRate) {
            return Carbon::parse($this->investRate?->expire_date)->format('d-M-Y');
        } else {
            return '-';
        }
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

    public function getActionFormatAttribute()
    {
        if ($this->investRate?->status == 0) {
            $color = 'warning';
            $status = 'Processing';
        } elseif ($this->investRate?->status == 1) {
            $color = 'success';
            $status = 'Finished';
        } else {
            $color = 'danger';
            $status = 'error';
        }
        return
         "<span class='badge bg-$color rounded-pill'> $status </span>"
        ;
    }

    public function getPeriodAttribute()
    {
        return $this->investRate ? $this->investRate?->period . ' days' : '-';
    }

    public function getRateAttribute()
    {
        return  $this->investRate ? ($this->investRate?->rate) * 100  . "%" : '-' ;
    }

    public function getProfitAttribute()
    {
        return $this->investRate ? '$' . number_format(((+$this->amount) * (+$this->investRate?->rate))) : '-' ;
    }
}
