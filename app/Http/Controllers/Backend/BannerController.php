<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    protected $path = 'storage/images/banner/';

    public function __construct()
    {
        $this->middleware("auth:adminstaff");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('id','desc')->paginate(20);

        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
        ]);

        $banner = new Banner();
        $banner->title = $request->title;

        if($request->image){
            $logoName = uniqid('digi').'.'.$request->image->extension();
            $banner->image = $logoName;
        }else{
            $banner->image = '';
        }
        if ($banner->save()) {
            if ($request->image) {
                $request->image->move(public_path($this->path), $logoName);
            }
            return back()->with('success', 'Banner created successfully!');
        }else{
            return back()->with('fail', 'something wrong');
        }
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
        $banner = Banner::findOrFail($id);
        return view('backend.banner.edit', compact('banner'));
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
            'title' => 'required',
        ]);

        $banner = Banner::findOrFail($id);
        $banner->title = $request->title;
        if($request->file('image')){
            $logoName = uniqid('digi').'.'.$request->image->extension();
            $banner->image = $logoName;
            if(file_exists(public_path($this->path).$banner->image)){
                unlink(public_path($this->path).$banner->image);
            }
        }else{
            $banner->image = $banner->image;
        }

        if($banner->save()){
            if($request->file('image')){

                $request->image->move(public_path($this->path), $logoName);
            }
            return redirect()->route('banner.index')->with('success', 'Banner updated successfully!');
        }else{
            return redirect()->route('banner.index')->with('fail', 'something wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if(file_exists(public_path($this->path).$banner->image)){
            unlink(public_path($this->path).$banner->image);
        }
        Banner::where('id',$id)->delete();
        return back()->with('success','banner deleted successfully');
    }
}
