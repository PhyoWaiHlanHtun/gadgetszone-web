<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusFine extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'type', // 1 - click commission ,2 - level commission ,3 - capital ,4 - investment
        'status' // 1 - Bonus , 2 - Fine
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
