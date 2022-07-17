<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\HomeAds;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeAdsController extends Controller
{
    protected $route = "backend.admin.home_ads.";

    public function __construct()
    {
        $this->middleware("auth:adminstaff");
    }

    public function index()
    {
        $ads = HomeAds::paginate(15);
        return view("{$this->route}index", compact('ads'));
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

        HomeAds::create([
            'url' => $request->url,
            'image' => storeImage($request->file('image'), 'photos'),
        ]);

        return redirect()->route('ads.index')->with('success', '* Successfully Added.');
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
    public function edit($id)
    {
        $ads = HomeAds::findOrFail($id);
        return view("{$this->route}edit", compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'nullable|mimes:jpg,jpen,png,gif|max:5000',
        ]);

        $ads = HomeAds::findOrFail($id);
        $image = ($request->image) ? storeImage($request->file('image'), 'photos') : $ads->image;
        $ads->update([
            'url' => $request->url,
            'image' => $image
        ]);

        return redirect()->route('ads.index')->with('success', '* Successfully Edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HomeAds::findOrFail($id)->delete();
        return redirect()->route('ads.index')->with('success', '* Successfully Deleted.');
    }
}
