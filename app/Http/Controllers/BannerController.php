<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index (){

        return view('banner.index');
    }
    public function create (){

        return view('banner.create');
    }
    public function store (Request $request){
        // dd($request->all());
        $path = Storage::disk('local')->put('public/banner', $request->banner_img);
        // dd($path);  //圖片路徑

        Banner::create([
            'img_path' => $path,
            'img_opacity' => $request->img_opacity,
            'weight' =>$request->weight,
        ]);


        return redirect('/banner');
    }
    public function edit (){

        return view('banner.edit');

    }
    public function update (){

        return redirect('/banner');
    }
    public function delete (){

        return redirect('/banner');
    }
}
