<?php

namespace App\Http\Controllers\Api;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        $data = About::orderBy('serial', 'asc')->get();
        $image = url('/').'/assets/images/about/economy-system.PNG';

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'image' => $image,
            'data' => $data,
        ]);
    }
}
