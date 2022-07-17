<?php

namespace App\Http\Controllers\Api;

use App\Models\AdminStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountantController extends Controller
{
    public function index()
    {
        $data = AdminStaff::select('id', 'username', 'email', 'phone')->where('is_admin', 2)->orderBy('id', 'desc')->get();
        return response()->json([
            'data' => $data
        ]);
    }
}
