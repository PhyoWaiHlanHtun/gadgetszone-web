<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BankEditRequest;
use App\Http\Requests\Admin\BankCreateRequest;

class BankController extends Controller
{
    protected $route = "backend.admin.bank.";

    public function __construct()
    {
        $this->middleware("auth:adminstaff");
    }

    public function index()
    {
        $bank = Bank::all();
        return view("{$this->route}index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("{$this->route}create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankCreateRequest $request)
    {
        // dd($request->all());
        $images = $request->file('images');
        foreach ($images as $image) {
            $path = storeImage($image, 'bank');
        }
        
        Bank::create([
            'name' => $request->name,
            'account' => $request->account,
            'phone' => $request->phone,
            'image' => $path,
            'type' => $request->type
        ]);

        return redirect()->route('bank.index')->with('success', '* Successfully Added.');
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
    public function edit(Bank $bank)
    {
        return view("{$this->route}edit", compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankEditRequest $request, Bank $bank)
    {
        // dd($request->all());
        $bank->update([
            'name' => $request->name,
            'account' => $request->account,
            'phone' => $request->phone,
            'type' => $request->type
        ]);

        if (!$request->old) {
            $images = $request->file('images');
        
            foreach ($images as $image) {
                $path = storeImage($image, 'bank');
            }
            $bank->update([ 'image' => $path ]);
        }
        return redirect()->route('bank.index')->with('success', '* Successfully Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->update(['status' =>  0]);
        return redirect()->route('bank.index')->with('success', '* Successfully Deleted.');
    }
}
