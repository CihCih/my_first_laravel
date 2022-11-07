<?php

namespace App\Http\Controllers;

// use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        // $data1 = DB::table('news')->take(3)->get(); //舊的三個
        $newses = DB::table('news')->orderBy('id', 'desc')->take(3)->get(); //新的三個
        // $data3 = DB::table('news')->inRandomOrder()->take(3)->get(); //隨機三個

        // dd($data1,$newses,$data3);

        $product_box1 = Product::orderBy('id', 'desc')->take(4)->get();
        $product_box2 = Product::orderBy('id', 'desc')->skip(4)->take(4)->get();

        $products = Product::inRandomOrder()->first();


        return view('index', compact('newses','product_box1','product_box2','products'));
    }

    public function comment() //這段comment功能的目的是為了抓取資料庫所有的留言回傳給頁面
    {
        //以下這行使用orderby將最新的排序到最前面後，取出所有資料
        // $comments = DB::table('comments')->orderby('id', 'desc')->get();  //DB直接存取

        $comments = Comment::orderby('id', 'desc')->get(); //使用model抓資料
        // dd($comments);

        $header = '留言管理';
        $slot = '';

        return view('comment.comment', compact('comments','header','slot'));
    }

    public function save_comment(Request $request)
    {
        // dd($request -> all());

        //DB直接操作
        // DB::table('comments')->insert([
        //     'title' => $request->title,
        //     'name' => $request->name,
        //     'context' => $request->content,
        //     'email' => '',
        // ]);

        Comment::create([
            'title' => $request->title,
            'name' => $request->name,
            'context' => $request->content,
            'email' => '',
        ]);

        return redirect('/comment');
    }
    public function delete_comment($target){
        // dd($target);
    //    DB::table('comments')->where('id', $target)->delete();
       Comment::where('id', $target)->delete();

        return redirect('/comment'); //重新導向 與view不同
    }



    public function edit_comment($id){
    //    $comment = DB::table('comments')->where('id', $id)->get();
    //    $comment = DB::table('comments')->where('id', $id)->first(); //從符合條件的筆數中，抓第一筆(結果是單筆所以不會是陣列)
    //    $comment =  DB::table('comments')->find($id); //直接去找match的ID
       $comment =  Comment::find($id); //直接去找match的ID
       //   dd($comment);

       $header = '留言管理-編輯';
       $slot = '';

        return view('comment.edit',compact('comment','header','slot'));
    }
    public function update_comment($id, Request $request){
        // dd($id, $request->all());
        //DB操作 注意只能用where
        // DB::table('comments')->where('id', $id)->update([
            Comment::where('id', $id)->update([
            'title' => $request->title,
            'name' => $request->name,
            'context' => $request->content,
            'email' => '',
        ]);
        return redirect('/comment'); //重新導向 與view不同

    }

    public function product_detail($id){
        $product = Product::find($id);
        return view('product-inside',compact('product'));
    }

    public function add_cart(Request $request){

        $product = Product::find($request->product_id);

        if ($request->add_qty > $product->product_qty) {
            $result = [
                'result' => 'error',
                'message' => '欲購買數量超過庫存，請聯絡賣家'
            ];
            return $result;
        }elseif ($request->add_qty < 1){
            $result = [
                'result' => 'error',
                'message' => '購買數量異常，請重新確認'
            ];
            return $result;
        }
    }
}
