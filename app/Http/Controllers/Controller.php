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

    public function index()
    {
        // $data1 = DB::table('news')->take(3)->get(); //舊的三個
        $newses = DB::table('news')->orderBy('id', 'desc')->take(3)->get(); //新的三個
        // $data3 = DB::table('news')->inRandomOrder()->take(3)->get(); //隨機三個

        // dd($data1,$newses,$data3);

        return view('index', compact('newses'));
    }

    public function comment()
    {
        $comments = DB::table('comments')->orderBy('id', 'desc')->get();

        return view('comment.comment', compact('comments'));
    }

    public function save_comment(Request $request)
    {
        // dd($request -> all());

        DB::table('comments')->insert([
            'title' => $request->title,
            'name' => $request->name,
            'context' => $request->content,
            'email' => '',

        ]);
        return redirect('/comment');
    }
    public function delete_comment($target){
        // dd($target);
       DB::table('comments')->where('id', $target)->delete();

        return redirect('/comment'); //重新導向 與view不同
    }



    public function edit_comment($id){
    //    $comment = DB::table('comments')->where('id', $id)->get();
    //    $comment = DB::table('comments')->where('id', $id)->first(); //從符合條件的筆數中，抓第一筆(結果是單筆所以不會是陣列)
       $comment =  DB::table('comments')->find($id); //直接去找match的ID
        //   dd($comment);

        return view('comment.edit',compact('comment'));
    }
    public function update_comment($id, Request $request){
        // dd($id, $request->all());
        //DB操作 注意只能用where
        DB::table('comments')->where('id', $id)->update([
            'title' => $request->title,
            'name' => $request->name,
            'context' => $request->content,
            'email' => '',
        ]);
        return redirect('/comment'); //重新導向 與view不同

    }
}
