<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Bank;
use App\Models\About;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\HomeAds;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

        $new = Products::where('category_id', $category)->whereHas('type', function ($query) {
            $query->where('name', 'LIKE', 'new');
        })->paginate(10);

        $special = Products::where('category_id', $category)->whereHas('type', function ($query) {
            $query->where('name', 'LIKE', 'special');
        })->paginate(10);

        return view('frontend.index', compact('partners', 'new', 'special', 'banners', 'ads'));
    }

    public function diginvest()
    {
        return view('frontend.diginvest');
    }

    public function about()
    {
        $abouts = About::where('status', 1)->orderBy('serial', 'asc')->get();
        return view('frontend.about', compact('abouts'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function createContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return back()->with('success', 'Your message send successfully!');
    }

    // Home Page Products Pagination Ajax

    public function new_fetch(Request $request)
    {
        if ($request->ajax()) {
            $category = $request->cookie('category');

            $new = Products::where('category_id', $category)->whereHas('type', function ($query) {
                $query->where('name', 'LIKE', 'new');
            })->paginate(10);
            
            return view('frontend.new-products', compact('new'))->render();
        }
    }

    public function special_fetch(Request $request)
    {
        if ($request->ajax()) {
            $category = $request->cookie('category');

            $special = Products::where('category_id', $category)->whereHas('type', function ($query) {
                $query->where('name', 'LIKE', 'special');
            })->paginate(10);
            
            return view('frontend.special-products', compact('special'))->render();
        }
    }

    public function privacy()
    {
        return view("frontend.privacy");
    }
}
