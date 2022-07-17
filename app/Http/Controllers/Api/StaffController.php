<?php

namespace App\Http\Controllers\Api;

use App\Models\AdminStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:adminstaff');
    // }

    public function index()
    {
        $data = AdminStaff::select('id', 'username', 'email', 'phone')->where('is_admin', '==', 0)->orderBy('id', 'desc')->get();
        return response()->json([
            'data' => $data
        ]);
    }
}
