<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners =  Banner::get();

        return view('banner.index', compact('banners'));
    }


    public function create()
    {

        return view('banner.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $path = Storage::disk('local')->put('public/banner', $request->banner_img);
        // dd($path);  //圖片路徑
        $path = str_replace("public", "storage", $path); //將路徑中的public置換成storage

        Banner::create([
            'img_path' => '/' . $path,
            'img_opacity' => $request->img_opacity,
            'weight' => $request->weight,
        ]);


        return redirect('/banner');
    }


    public function edit($id)
    {
        $banner = BANNER::find($id);

        return view('banner.edit', compact('banner'));
    }


    public function update(Request $request,$id)
    {
        // dd($request->all());
        $path = Storage::disk('local')->put('public/banner', $request->banner_img);
        // dd($path);  //圖片路徑
        $path = str_replace("public", "storage", $path); //將路徑中的public置換成storage

        $banner = BANNER::find($id);
        $banner->img_path= '/' . $path;
        $banner->img_opacity= $request->img_opacity;
        $banner->weight= $request->weight;
        $banner->save();

        return redirect('/banner');
    }


    public function delete()
    {

        return redirect('/banner');
    }
}
