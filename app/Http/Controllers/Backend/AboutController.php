<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use PDO;

class AboutController extends Controller
{
    protected $path = 'storage/images/about/';

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
        $abouts = About::orderBy('id', 'desc')->paginate(15);

        return view('backend.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'title' => 'required',
            'para' => 'required',
            'status' => 'required',
            'serial' => 'required|numeric'
        ]);

        $about = new About();
        $about->title = $request->title;
        $about->para = $request->para;
        $about->status = $request->status;
        $about->serial = $request->serial;
        if ($request->image) {
            $logoName = uniqid('digi').'.'.$request->image->extension();
            $about->image = $logoName;
        }
        if ($about->save()) {
            if ($request->image) {
                $request->image->move(public_path($this->path), $logoName);
            }
            return redirect(route('about.index'))->with('success', 'Data created successfully!');
        } else {
            return redirect(route('about.index'))->with('fail', 'something wrong');
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
        $about = About::findOrFail($id);

        return view('backend.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);

        return view('backend.about.edit', compact('about'));
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
            'para' => 'required',
            'status' => 'required',
            'serial' => 'required|numeric'
        ]);

        $about = About::findOrFail($id);
        $about->title = $request->title;
        $about->para = $request->para;
        $about->status = $request->status;
        $about->serial = $request->serial;
        if ($request->file('image')) {
            $logoName = uniqid('digi').'.'.$request->image->extension();
            $about->image = $logoName;
            if (file_exists(public_path($this->path).$about->image)) {
                unlink(public_path($this->path).$about->image);
            }
        } else {
            $about->image = $about->image;
        }

        if ($about->save()) {
            if ($request->file('image')) {
                $request->image->move(public_path($this->path), $logoName);
            }
            return redirect()->route('about.index')->with('success', 'Data updated successfully!');
        } else {
            return redirect()->route('about.index')->with('fail', 'something wrong');
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
        $about = About::findOrFail($id);
        if ($about->image) {
            if (file_exists(public_path($this->path).$about->image)) {
                unlink(public_path($this->path).$about->image);
            }
        }
        About::where('id', $id)->delete();
        return redirect()->route('about.index')->with('success', 'Data deleted successfully!');
    }
}
