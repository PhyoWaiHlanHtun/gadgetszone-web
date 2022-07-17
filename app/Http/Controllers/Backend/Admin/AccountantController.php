<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\AdminStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\AccountantEditRequest;
use App\Http\Requests\Admin\StaffCreateRequest;

class AccountantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $route = "backend.admin.accountant.";

    public function __construct()
    {
        // $this->middleware(["auth:adminstaff", 'isAdmin']);
        $this->middleware('auth:adminstaff');
    }

    public function index()
    {
        return view("{$this->route}index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view("{$this->route}create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffCreateRequest $request)
    {
        // AdminStaff::create([
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'password' => Hash::make($request->password),
        //     'is_admin' => 2
        // ]);

        // return redirect()->route('accountant.index')->with('success', '* Successfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminStaff $accountant)
    {
        // return view("{$this->route}edit", compact('accountant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountantEditRequest $request, $id)
    {
        // return $request->all();
        // AdminStaff::findOrFail($id)->update([
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'phone' => $request->phone
        // ]);

        // if ($request->password) {
        //     AdminStaff::findOrFail($id)->update([
        //         'password' => Hash::make($request->password)
        //     ]);
        // }

        // return redirect()->route('accountant.index')->with('success', '* Successfully Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // AdminStaff::findOrFail($id)->delete();
        // return redirect()->route('accountant.index')->with('success', '* Successfully Deleted.');
    }
}
