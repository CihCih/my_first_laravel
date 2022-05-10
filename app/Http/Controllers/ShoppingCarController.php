<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingCarController extends Controller
{
    public function index(){

        // $data1 = DB::table('news')->take(3)->get(); //舊的三個
        $data2 = DB::table('news')->orderBy('id', 'desc')->take(3)->get(); //新的三個
        // $data3 = DB::table('news')->inRandomOrder()->take(3)->get(); //隨機三個

        // dd($data1,$data2,$data3);

        return view('shopping.index');
    }
    public function step01(){
        return view('shopping.checkedout1');
    }
    public function step02(){
        return view('shopping.checkedout2');
    }
    public function step03(){
        return view('shopping.checkedout3');
    }
    public function step04(){
        return view('shopping.checkedout4');
    }
}
