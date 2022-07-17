<?php

namespace App\Http\Controllers\Backend\Product;

use App\Models\Brands;
use App\Models\Category;
use App\Models\ProductTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    protected $path = 'storage/images/product/';

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
        $brands = Brands::all();
        $products = Products::orderby('updated_at', 'desc')->paginate(15);

        return view('backend.product.index', compact('cates', 'types', 'brands', 'products'));
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
            'brand_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $product = new Products();
        $product->category_id = $request->category_id;
        $product->type_id = $request->type_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->images) {
            foreach ($request->images as $image) {
                $imageName = uniqid('digi').'.'.$image->extension();
                $imageArr[] = $imageName;
            }
            $photos = implode(',', $imageArr);
        }

        $product->images = $photos;

        if ($product->save()) {
            for ($i=0; $i < count($imageArr); $i++) {
                $request->images[$i]->move(public_path($this->path), $imageArr[$i]);
            }
            return back()->with('success', 'Product created successfully!');
        } else {
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
        $product = Products::findOrFail($id);
        return view('backend.product.show', compact('product'));
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
        $brands = Brands::all();
        $product = Products::findOrFail($id);

        return view('backend.product.edit', compact('cates', 'types', 'brands', 'product'));
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
            'brand_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $product = Products::findOrFail($id);
        $product->category_id = $request->category_id;
        $product->type_id = $request->type_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->images) {
            foreach ($request->images as $image) {
                $imageName = uniqid('digi').'.'.$image->extension();
                $imageArr[] = $imageName;
            }
            $photos = implode(',', $imageArr);
            $product->images = $photos;
            foreach (explode(',', $product->images) as $img) {
                if (file_exists(public_path($this->path).$img)) {
                    unlink(public_path($this->path).$img);
                }
            }
        } else {
            $product->images = $product->images;
        }


        if ($product->save()) {
            if ($request->images) {
                for ($i=0; $i < count($imageArr); $i++) {
                    $request->images[$i]->move(public_path($this->path), $imageArr[$i]);
                }
            }
            return redirect()->route('products.index')->with('success', 'Product updates successfully!');
        } else {
            return redirect()->route('products.index')->with('fail', 'something wrong');
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
        $product = Products::findOrFail($id);
        foreach (explode(',', $product->images) as $img) {
            if (file_exists(public_path($this->path).$img)) {
                unlink(public_path($this->path).$img);
            }
        }
        Products::where('id', $id)->delete();

        return back()->with('success', 'Product deleted successfully!');
    }
}
