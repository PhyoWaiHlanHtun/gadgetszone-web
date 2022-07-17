<?php

namespace App\Http\Controllers\Api;

use App\Models\DigiInvest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DigInvestController extends Controller
{
    public function index()
    {
        $data = DigiInvest::all();
        $image = url('/').'/assets/images/about/economy-system.PNG';

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'image' => $image,
            'data' => $data,
        ]);
    }
}
