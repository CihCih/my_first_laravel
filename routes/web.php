<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NEWSController;
use App\Http\Controllers\ShoppingCarController;

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

Route::get('/', [Controller::class, 'index']);

// Route::get('/test', function () {
//     return view('welcome');
// });

// Route::get('/say', function () {
//     return 'Hello World';
// });

//microsoft
Route::get('/microsoft', [NEWSController::class, 'index']);

//bootstrap
// Route::get('/bootstrap', [ShoppingCarController::class, 'index']);
// Route::get('/shopping1', [ShoppingCarController::class, 'step01']);
// Route::get('/shopping2', [ShoppingCarController::class, 'step02']);
// Route::get('/shopping3', [ShoppingCarController::class, 'step03']);
// Route::get('/shopping4', [ShoppingCarController::class, 'step04']);

// Route::get('/login', [Controller::class, 'login']);
