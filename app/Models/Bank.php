<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [ 'name' , 'image' , 'account', 'phone' , 'status' , 'type' ];

    // Status - 1 Active , Status - 2 Unactive , delete
    // Type - 1 Topup & Withdrawal , Type - 2 Investment , Type - 3 Donation
}
