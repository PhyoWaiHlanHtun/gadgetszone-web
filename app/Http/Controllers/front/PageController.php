<?php

namespace App\Http\Controllers\front;

use App\Models\Banner;
use App\Models\HomeAds;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $partners = Partner::all();
        $ads = HomeAds::all();
        $banners = Banner::all();

        $old_category = $request->cookie('category');
        // $category_limit = Category::latest()->first()->id; // Real code
        $category_limit = 5;   // Temporary code
        $category = ($old_category) ? (int) $old_category + 1 : 1 ;
        if ((int)$category > $category_limit) {
            $category = 1;
        }
        Cookie::queue('category', $category, 1500);

        $new = Products::with(['category','type','brand'])->where('category_id', $category)->paginate(15);

        $first = Products::with(['category','type','brand'])->whereBetween('price', [5 ,10])->limit(10)->get();
        $second = Products::with(['category','type','brand'])->whereBetween('price', [50 ,100])->limit(10)->get();
        $third = Products::with(['category','type','brand'])->where('price', '>=', 1000)->limit(10)->get();

        return view('frontend-new.index', compact('partners', 'new', 'banners', 'ads', 'first', 'second', 'third'));
    }
}
