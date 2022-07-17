<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    protected $route = "backend.admin.donation.";

    public function __construct()
    {
        $this->middleware("auth:adminstaff");
    }

    public function index()
    {
        return view("{$this->route}index");
    }
}
