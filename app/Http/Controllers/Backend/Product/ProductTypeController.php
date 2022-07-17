<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductTypes;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    protected $path = 'storage/images/type/';

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
        $types = ProductTypes::orderby('updated_at','desc')->paginate(30);
        $cates = Category::all();
        return view('backend.type.index', compact('types', 'cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'name' => 'required'
        ]);

        $type = new ProductTypes();
        $type->category_id = $request->category_id;
        $type->name = $request->name;
        if($request->photo){
            $logoName = uniqid('digi').'.'.$request->photo->extension();
            $type->photo = $logoName;
        }
        if($type->save()){
            if($request->photo){
                $request->photo->move(public_path($this->path), $logoName);
            }
            return back()->with('success', 'Product type created successfully!');
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
        $type = ProductTypes::findOrFail($id);
        $cates = Category::all();
        return view('backend.type.edit', compact('type', 'cates'));
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
            'name' => 'required',
            'category_id' => 'required'
        ]);

        $cate = ProductTypes::findOrFail($id);
        $cate->category_id = $request->category_id;
        $cate->name = $request->name;
        if($request->file('photo')){
            $logoName = uniqid('digi').'.'.$request->photo->extension();
            $cate->photo = $logoName;
            if(file_exists(public_path($this->path).$cate->photo)){
                unlink(public_path($this->path).$cate->photo);
            }
        }else{
            $cate->photo = $cate->photo;
        }

        if($cate->save()){
            if($request->file('photo')){

                $request->photo->move(public_path($this->path), $logoName);
            }
            return redirect()->route('types.index')->with('success', 'Product type updated successfully!');
        }else{
            return redirect()->route('types.index')->with('fail', 'something wrong');
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
        $cate = ProductTypes::findOrFail($id);

        if(file_exists(public_path($this->path).$cate->photo)){
            unlink(public_path($this->path).$cate->photo);
        }
        ProductTypes::where('id',$id)->delete();
        return redirect()->route('types.index')->with('success', 'Product type deleted successfully!');
    }
}
