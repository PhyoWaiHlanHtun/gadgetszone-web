<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $path = 'storage/images/category/';

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
        $cates = Category::orderby('updated_at','desc')->paginate(30);
        return view('backend.category.index', compact('cates'));
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
            'name' => 'required',
        ]);

        $cate = new Category();
        $cate->name = $request->name;
        if($request->photo){
            $logoName = uniqid('digi').'.'.$request->photo->extension();
            $cate->photo = $logoName;
        }
        if($cate->save()){
            if($request->photo){
                $request->photo->move(public_path($this->path), $logoName);
            }
            return back()->with('success', 'Category created successfully!');
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
        $cate = Category::findOrFail($id);
        return view('backend.category.edit', compact('cate'));
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
        ]);

        $cate = Category::findOrFail($id);
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
            return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
        }else{
            return redirect()->route('categories.index')->with('fail', 'something wrong');
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
        $cate = Category::findOrFail($id);

        if(file_exists(public_path($this->path).$cate->photo)){
            unlink(public_path($this->path).$cate->photo);
        }
        Category::where('id',$id)->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

}
