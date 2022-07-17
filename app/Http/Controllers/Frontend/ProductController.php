<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::inRandomOrder()->paginate(15);

        // return $products;
        return view('frontend.product.index', compact('products'));
    }

    public function single($id)
    {
        $product = Products::findOrFail($id);

        $related = Products::where('category_id', $product->category_id)->limit(8)->get();

        return view('frontend.product.single-product', compact('product', 'related'));
    }
}
