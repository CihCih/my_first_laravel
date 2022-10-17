<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use App\Http\Controllers\FilesController;

class BannerController extends Controller
{
    public function index()
    {
        //將所有banner資料從資料庫拿出來,並且輸出到列表頁上
        $banners =  Banner::get();//將所有banner資料從資料庫拿出來
        $header = '';
        $slot = '';
        return view('banner.index', compact('banners','header','slot')); //輸出到列表頁上
    }



    //banner新增組
    public function create()
    {
        $header = '';
        $slot = '';
        //準備新贈用的表單給使用者
        return view('banner.create', compact('header','slot'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        //將使用者填寫的資料,經過處理(Ex:檔案上傳/防呆...)後，新增置資料庫
        //上傳檔案並產生路徑(laravel內建作法)
        // $path = Storage::disk('local')->put('public/banner', $request->banner_img);
        // dd($path);  //圖片路徑
        // $path = str_replace("public", "storage", $path); //將路徑中的public置換成storage
        //上傳檔案並產生路徑(FileController作法)
        $path = FilesController::imgUpload($request->banner_img,'banner');
        Banner::create([
            'img_path' => $path,
            'img_opacity' => $request->img_opacity,
            'weight' => $request->weight,
        ]);

        return redirect('/banner');//重新導向 與view不同
    }



    //banner編輯組
    public function edit($id)
    {
        //根據id找到想編輯的資料，將資料連同編輯用的畫面回傳給使用者
        $banner = BANNER::find($id);
        $header = '';
        $slot = '';
        return view('banner.edit', compact('banner','header','slot'));
    }

    public function update(Request $request,$id)
    {
        // dd($request->all());
        //根據id找到想修改的資料
        $banner = Banner::find($id); //找到的那筆資料

        if($request->hasFile('banner_img')){

            //使用者上傳的資料，先經過處理(Ex:檔案上傳/防呆...)後
            //(laravel內建作法)
            // $path = Storage::disk('local')->put('public/banner', $request->banner_img);
            // dd($path);  //圖片路徑
            // $path = str_replace("public", "storage", $path); //將路徑中的public置換成storage

            $path = FilesController::imgUpload($request->banner_img,'banner');

            //將舊有資料檔案刪除(laravel內建作法)
            // $target = str_replace("/storage","public",$banner->img_path); //將路徑中的storage恢復成public
            // Storage::disk('local')->delete($target); //刪除舊圖片

            FilesController::deleteUpload($banner->img_path);

            //將新的資料更新到資料庫裡面
            $banner->img_path= $path; //更新
        }
        $banner->img_opacity= $request->img_opacity;//更新
        $banner->weight= $request->weight;//更新
        $banner->save();

        return redirect('/banner');//重新導向 與view不同
    }



    public function delete($id)
    {
        // dd($id);
        //使用id找到要刪除的資料，並且連同相關檔案一起刪除
        $banner = Banner::find($id); //找到要刪掉的東西
        // $target = str_replace("/storage","public",$banner->img_path);//將路徑中的storage恢復成public
        // Storage::disk('local')->delete($target);//刪除舊圖片
        FilesController::deleteUpload($banner->img_psth);
        $banner->delete(); //刪除資料庫

        return redirect('/banner');//重新導向(送出新的request)到列表頁
    }
}
