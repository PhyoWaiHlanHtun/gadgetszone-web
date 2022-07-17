<?php

namespace App\Http\Controllers\Api;

use App\Models\Banner;
use App\Models\HomeAds;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;

class HomeController extends Controller
{
    public function ads()
    {
        $ads =  HomeAds::all();
        $data = [];
        foreach ($ads as $ad) {
            $data[] = [
                'id' => $ad->id,
                'url' => $ad->url,
                'image' => getImageFile($ad->image)
            ];
        }

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => $data
        ]);
    }

    public function partners()
    {
        $partners =  Partner::all();
        $data = [];
        foreach ($partners as $partner) {
            $data[] = [
                'id' => $partner->id,
                'image' => getImageFile($partner->image)
            ];
        }

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => $data
        ]);
    }

    public function banners()
    {
        $banners =  Banner::all();
        $data = [];
        foreach ($banners as $banner) {
            $data[] = [
                'id' => $banner->id,
                'title' => $banner->title,
                'image' => ($banner->image) ? url('/').'/storage/images/banner/'. $banner->image : url('/').'/default.png'
            ];
        }

        if (count($data) == 0) {
            $data = [
                'id' => null,
                'title' => 'Your Home Smart Devices & Best Solution',
                'image' => url('/').'/assets/images/hero/inner-img/hero-1-2.webp'
            ];
        }

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'data' => $data
        ]);
    }
}
