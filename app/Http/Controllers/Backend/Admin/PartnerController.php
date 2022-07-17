<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    protected $route = "backend.admin.partner.";

    public function __construct()
    {
        $this->middleware("auth:adminstaff");
    }

    public function index()
    {
        $partners = Partner::paginate(15);
        return view("{$this->route}index", compact('partners'));
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
    public function store(Request $request)
    {
        // ddd($request->all());

        $this->validate($request, [
            'image' => 'required|mimes:jpg,jpen,png,gif|max:5000',
        ]);

        Partner::create([
            'image' => storeImage($request->file('image'), 'partners'),
        ]);

        return redirect()->route('partner.index')->with('success', '* Successfully Added.');
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
    public function edit(Partner $partner)
    {
        return view("{$this->route}edit", compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,jpen,png,gif|max:5000',
        ]);

        $partner->update([
            'image' => storeImage($request->file('image'), 'partners')
        ]);
        return redirect()->route('partner.index')->with('success', '* Successfully Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partner.index')->with('success', '* Successfully Deleted.');
    }
}
