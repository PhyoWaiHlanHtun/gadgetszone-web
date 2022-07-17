<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Test;

class EmailController extends Controller
{
    public function hello()
    {
        // dd("some");
        Mail::send(new Test('moesat171@gmail.com'));
    }
}
