<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'invest_id' , 'plan' , 'rate' , 'profit', 'period' , 'expire_date' , 'status' , 'type'
    ];

    public function invest()
    {
        return $this->belongsTo(DigiInvest::class, 'invest_id');
    }
}
