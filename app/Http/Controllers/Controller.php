<?php

namespace App\Http\Controllers;

// use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        // $data1 = DB::table('news')->take(3)->get(); //舊的三個
        $newses = DB::table('news')->orderBy('id', 'desc')->take(3)->get(); //新的三個
        // $data3 = DB::table('news')->inRandomOrder()->take(3)->get(); //隨機三個

        // dd($data1,$newses,$data3);

        return view('index',compact('newses'));
    }

    public function comment(){
        return view('comment.comment');
    }

    public function save_comment(Request $request){
        dd($request -> all());
    }
}
