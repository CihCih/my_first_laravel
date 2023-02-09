<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

        session([
            // key and value;(鍵 與 值)
            'pay' => $request->pay,
            'deliver' => $request->deliver,
        ]);
        return view('shopping.checkedout3');
    }
    public function step04(Request $request){
        Order::create([
            // 'user_id'=>
            // 'subtotal'=>
            // 'shipping_fee'=>
            // 'total'=>
            // 'product_qty'=>
            'pay_way'=> session()->get('pay'),
            'shipping_way'=> session()->get('deliver'),
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            // 'add'=> $request->code.$request->city.$request->address,
        ]);
        // dump(session()->all());
        dd($request);
        return view('shopping.checkedout4');
    }
}
