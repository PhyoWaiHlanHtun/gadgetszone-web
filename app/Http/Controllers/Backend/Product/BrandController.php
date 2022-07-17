<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;
use App\Models\ProductTypes;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $path = 'storage/images/brand/';

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
        $cates = Category::all();
        $types = ProductTypes::all();
        $brands = Brands::orderby('updated_at','desc')->paginate(30);

        return view('backend.brand.index', compact('cates', 'types', 'brands'));
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
            'category_id' => 'required',
            'type_id' => 'required',
            'name' => 'required',
        ]);

        $brand = new Brands();
        $brand->category_id = $request->category_id;
        $brand->type_id = $request->type_id;
        $brand->name = $request->name;
        if($request->photo){
            $logoName = uniqid('digi').'.'.$request->photo->extension();
            $brand->photo = $logoName;
        }
        if($brand->save()){
            if($request->photo){
                $request->photo->move(public_path($this->path), $logoName);
            }
            return back()->with('success', 'Brand created successfully!');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates = Category::all();
        $types = ProductTypes::all();
        $brand = Brands::findOrFail($id);
        return view('backend.brand.edit', compact('types', 'cates', 'brand'));
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
            'category_id' => 'required',
            'type_id' => 'required',
            'name' => 'required',
        ]);

        $brand = Brands::findOrFail($id);
        $brand->category_id = $request->category_id;
        $brand->type_id = $request->type_id;
        $brand->name = $request->name;

        if($request->file('photo')){
            $logoName = uniqid('digi').'.'.$request->photo->extension();
            $brand->photo = $logoName;
            if(file_exists(public_path($this->path).$brand->photo)){
                unlink(public_path($this->path).$brand->photo);
            }
        }else{
            $brand->photo = $brand->photo;
        }

        if($brand->save()){
            if($request->file('photo')){
                $request->photo->move(public_path($this->path), $logoName);
            }
            return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
        }else{
            return redirect()->route('brands.index')->with('fail', 'something wrong');
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
        $cate = Brands::findOrFail($id);

        if(file_exists(public_path($this->path).$cate->photo)){
            unlink(public_path($this->path).$cate->photo);
        }
        Brands::where('id',$id)->delete();
        return redirect()->route('brands.index')->with('success', 'brand deleted successfully!');
    }
}
