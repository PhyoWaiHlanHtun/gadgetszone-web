<?php

namespace App\Http\Controllers\Api;

use App\Models\Brands;
use App\Models\Products;
use App\Models\ProductTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // return response()->json([
        //     'types' => $request->type,
        // ]);
        switch ($request->type) {
            case 'type':
                $types = ProductTypes::where('category_id', $request->id)->get();
                $brands = Brands::where('category_id', $request->id)->get();
                return response()->json([
                    'types' => $types,
                    'brands' => $brands
                ]);
                break;

            case 'brand':
                $brands = Brands::where([
                    ['type_id', $request->id],
                    // ['category_id', $request->cate]
                ])->get();

                return response()->json([
                    'brands' => $brands,
                ]);
                break;
            case 'cate':
                $types = ProductTypes::where('category_id', $request->id)->get();
                return response()->json([
                    'types' => $types,
                ]);
                break;
        }
    }

    public function single($id)
    {
        $product = Products::with('category', 'type', 'brand')->where('id', $id)->first();

        return response()->json([
            'product' => $product
        ]);
    }

    // App Mobile
    
    public function all_products()
    {
        $products = Products::all();

        $data = [];

        foreach ($products as $product) {
            $data[] = new ProductResource($product);
        }
        
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => $data
        ]);
    }

    public function new_products(Request $request)
    {
        // // $category_limit = Category::latest()->first()->id; // Real code
        $category_limit = 5;   // Temporary code
        $category = $request->category;
        if ((int)$category > $category_limit) {
            $category = 1;
        }
        
        $products = Products::where('category_id', $category)->whereHas('type', function ($query) {
            $query->where('name', 'LIKE', 'new');
        })->get();

        $data = [];

        foreach ($products as $product) {
            $data[] = new ProductResource($product);
        }
        
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => [
                'category_limit' => $category_limit,
                'products' => $data,
            ]
        ]);
    }

    public function special_products(Request $request)
    {
        // // $category_limit = Category::latest()->first()->id; // Real code
        $category_limit = 5;   // Temporary code
        $category = $request->category;
        if ((int)$category > $category_limit) {
            $category = 1;
        }
        $products = Products::where('category_id', $category)->whereHas('type', function ($query) {
            $query->where('name', 'LIKE', 'special');
        })->get();

        $data = [];

        foreach ($products as $product) {
            $data[] = new ProductResource($product);
        }
        
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => [
                'category_limit' => $category_limit,
                'products' => $data,
            ]
        ]);
    }

    public function show($id)
    {
        $product = Products::find($id);

        if (!$product) {
            return response()->json([
                'status' => 404,
                'message' => "Product Not Found."
            ]);
        }

        $related = Products::where('category_id', $product->category_id)
                            ->where('type_id', $product->type_id)
                            ->where('id', '!=', $id)
                            ->inrandomorder()
                            ->limit(5)
                            ->get();

        $rel_data = [];

        foreach ($related as $rel) {
            $rel_data[] = new ProductResource($rel);
        }

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => [
                'product' => new ProductResource($product),
                'related' => $rel_data
            ],
        ]);
    }
}
