<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NEWSController;
use App\Http\Controllers\ShoppingCarController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','power'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', [Controller::class, 'index']);


Route::get('/comment', [Controller::class, 'comment']);
Route::get('/comment/save', [Controller::class, 'save_comment']);
Route::get('/comment/delete/{target}', [Controller::class, 'delete_comment']);

Route::get('/comment/edit/{id}', [Controller::class, 'edit_comment']);
Route::get('/comment/update/{id}', [Controller::class, 'update_comment']);


// Route::get('/test', function () {
//     return view('welcome');
// });

// Route::get('/say', function () {
//     return 'Hello World';
// });

//microsoft
Route::get('/microsoft', [NEWSController::class, 'index']);

// bootstrap
Route::get('/shopping1', [ShoppingCarController::class, 'step01']);
Route::get('/shopping2', [ShoppingCarController::class, 'step02']);
Route::get('/shopping3', [ShoppingCarController::class, 'step03']);
Route::get('/shopping4', [ShoppingCarController::class, 'step04']);


// BANNER管理相關頁面    手工建立版本(遵照resful API的規定)
// Route::get('/banner', [BannerController::class, 'index']); //總表，列表頁
// Route::post('/banner', [BannerController::class, 'store']); //儲存
// Route::get('/banner/create', [BannerController::class, 'create']); //新增頁
// Route::get('/banner/{id}', [BannerController::class, 'show']); //單筆檢視頁
// Route::post('/banner/{id}', [BannerController::class, 'edit']); //編輯頁
// Route::patch('/banner/{id}', [BannerController::class, 'update']); //更新
// Route::delete('/banner/{id}', [BannerController::class, 'destroy']); //刪除

// 以下一行抵七行
// Route::resource('banner', BannerController::class);



// 部分參考resful API個人習慣的寫法
//後台
Route::prefix('/banner')->middleware(['auth','power'])->group(function (){  //BANNER管理相關路由

    Route::get('/', [BannerController::class, 'index']); //總表，列表頁 =Read

    Route::get('/create', [BannerController::class, 'create']); //新增頁 =Create
    Route::post('/store', [BannerController::class, 'store']); //儲存 =Create

    Route::get('/edit{id}', [BannerController::class, 'edit']); //編輯頁 =Update
    Route::post('/update{id}', [BannerController::class, 'update']); //更新 =Update

    Route::post('/delete{id}', [BannerController::class, 'delete']); //刪除 =Delete
});

Route::prefix('/product')->middleware(['auth','power'])->group(function (){  //Product管理相關路由

    Route::get('/', [ProductController::class, 'index']); //總表，列表頁 =Read

    Route::get('/create', [ProductController::class, 'create']); //新增頁 =Create
    Route::post('/store', [ProductController::class, 'store']); //儲存 =Create

    Route::get('/edit{id}', [ProductController::class, 'edit']); //編輯頁 =Update
    Route::post('/update{id}', [ProductController::class, 'update']); //更新 =Update

    Route::post('/delete{id}', [ProductController::class, 'destroy']); //刪除 =Delete

    Route::delete('/delete_img{img_id}', [ProductController::class, 'delete_img']); //刪除次要圖片 (接收次要商品圖片id) =Delete

});

Route::prefix('/account')->middleware(['auth','power'])->group(function (){  //Account管理相關路由

    Route::get('/', [AccountController::class, 'index']); //總表，列表頁 =Read

    Route::get('/create', [AccountController::class, 'create']); //新增頁 =Create
    Route::post('/store', [AccountController::class, 'store']); //儲存 =Create

    Route::get('/edit{id}', [AccountController::class, 'edit']); //編輯頁 =Update
    Route::post('/update{id}', [AccountController::class, 'update']); //更新 =Update

    Route::post('/delete{id}', [AccountController::class, 'destroy']); //刪除 =Delete

});
