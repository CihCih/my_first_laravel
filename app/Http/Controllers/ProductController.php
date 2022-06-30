<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_img;
use App\Http\Controllers\FilesController;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::get();
        return view('product.index',compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());

        // 主要圖片上傳
        $path = FilesController::imgUpload($request->product_img, 'product');

        $product = Product::create([
            'img_path' => $path,
            'product_name' => $request->product_name,
            'introduce' => $request->introduce,
            'price'=> $request->price,
            'quantity'=> $request->quantity,
        ]);

        // 次要圖片上傳 多圖片上傳
        foreach ($request->second_img as $index => $element) {
            $path = FilesController::imgUpload($element, 'product');
            Product_img::create([
                'img_path' => $path,
                'product_id' =>$product->id,
            ]);
        }

        return redirect('/product');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        // dd($product);

        return view('/product.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($request->hasFile('product_img')){
            $path = FilesController::imgUpload($request->product_img, 'product');
            FilesController::deleteUpload($request->product_img);
            $product->img_path = $path;
        }

        $product->product_name = $request->product_name;
        $product->introduce = $request->introduce;
        $product->price= $request->price;
        $product->quantity= $request->quantity;

        $product->save();

        return redirect('/product');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        // 找出所有要被刪掉的商品的次要圖片
        $imgs = Product_img::where('product_id',$id);
        dd($imgs);
        FilesController::deleteUpload($product->img_path);
        $product->delete();

        return redirect('/product');
    }
}
