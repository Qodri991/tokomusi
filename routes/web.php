<?php

use App\http\Controllers\UserController;
use App\http\Controllers\LandingController;
use App\http\Controllers\ProductController;
use App\http\Controllers\CategoryController;
use App\http\Controllers\PaymentmethodController;
use App\http\Controllers\CartController;
use App\http\Controllers\AuthController;
use App\http\Controllers\CourierController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('dashboard.index');
// });

// Route::get('/category', [CategoryController::class, 'index']);
// Route::resource('category', CategoryController::class);
// Route::get('/category/create', [CategoryController::class, 'create']);
// Route::post('/category', [CategoryController::class, 'store']);
// Route::delete('/category/{category}', [CategoryController::class, 'destroy']);
// Route::get('/category/{category}/edit', [CategoryController::class, 'edit']);
// Route::patch('/category/{category}', [CategoryController::class, 'update']);

// Route::get('/product', [ProductController::class, 'index']);
// Route::get('/product/create', [ProductController::class, 'create']);
// Route::post('/product', [ProductController::class, 'store']);

//Admin
Route::group(['middleware'=>['auth', 'admin']], function(){
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('paymentmethod', PaymentmethodController::class);
    Route::resource('cart', CartController::class);
    Route::resource('courier', CourierController::class);
});

Route::resource('home', LandingController::class);

//User
Route::group(['middleware'=>['authuser', 'users']], function(){
    Route::get('/keranjang',[LandingController::class,'keranjang']);
    Route::post('/keranjang', [LandingController::class,'keranjang_store']);
    Route::post('/transaksi', [LandingController::class,'transaksi']);
    Route::get('/pembayaran/{inv}', [LandingController::class,'pembayaran']);
    Route::get('/history', [LandingController::class,'history']);
});

// Login dan regsieradbyv
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login' ,[AuthController::class,'login_store']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class,'register_store']);
Route::get('/logout',[AuthController::class,'logout']);



Route::get('/loginuser',[UserController::class,'login']);
Route::post('/loginuser',[UserController::class,'login_store']);
Route::get('/registeruser',[UserController::class,'register']);
Route::post('/registeruser',[UserController::class,'register_store']);
Route::get('/logoutuser',[UserController::class,'logout']);