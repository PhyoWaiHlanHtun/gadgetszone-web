<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Advertise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdvertiseController extends Controller
{
    protected $route = "backend.admin.advertise.";

    public function __construct()
    {
        $this->middleware("auth:adminstaff");
    }

    public function index()
    {
        $advertise = Advertise::latest()->get();
        return view("{$this->route}index", compact('advertise'));
    }

    public function store(Request $request)
    {
        // dd($request->image);
        $this->validate($request, [
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:5000',
        ]);

        Advertise::create([
            'image' => storeImage($request->file('image'), 'advertise')
        ]);
        return back()->with('success', '* Successfully Added');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:5000',
        ]);
        Advertise::findOrFail($id)->update([
            'image' => storeImage($request->file('image'), 'advertise')
        ]);
        return back()->with('success', '* Successfully Updated');
    }

    public function destroy($id)
    {
        $ads = Advertise::findOrFail($id);
        // Storage::delete('storage/images/'.$ads->image);
        $ads->delete();
        return redirect()->route('advertise.index')->with('success', '* Successfully Deleted.');
    }
}
