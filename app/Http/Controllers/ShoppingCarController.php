<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;

use Illuminate\Support\Facades\Auth;

class ShoppingCarController extends Controller
{
    public function step01(){
        // 登入的使用者ID，為了搜尋屬於他的購物清單
        $user = Auth::id();
        $products = ShoppingCart::where('user_id',$user)->get();

        $subtotal = 0;
        foreach ($products as $value) {
            $subtotal += $value->product->price * $value->qty;
        };
        return view('shopping.checkedout1',compact('products','subtotal'));
    }
    public function step02(Request $request){

        // session的使用方法，使用 鍵與值的方式將想帶到下一頁的資料寫進去
        session([
            // key and value;(鍵 與 值)
            'amount' => $request->qty,
        ]);
        return view('shopping.checkedout2');
    }
    public function step03(Request $request){


        dd($request->all());
        return view('shopping.checkedout3');
    }
    public function step04(){
        return view('shopping.checkedout4');
    }
}
