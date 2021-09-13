<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;

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
//     return view('welcome');
// });

// Route::get('/','Front\FrontController@home');

Route::get('/',[FrontController::class,'home'])->name('front.home');
Route::get('/product/{id}',[FrontController::class,'product_details'])->name('front.product.details');
Route::get('add-to-cart/{productId}',[CartController::class,'addToCart'])->name('add.to.cart');
Route::get('cart',[CartController::class,'cart'])->name('front.cart');
Route::get('remove-form-cart/{productId}',[CartController::class,'removeFormCart'])->name('remove.form.cart');
Route::get('checkout',[CheckoutController::class,'checkout'])->name('front.checkout');
Route::post('checkout',[CheckoutController::class,'store'])->name('front.order.place');
Route::get('order/success',[CheckoutController::class,'success'])->name('front.order.success');

Route::middleware('auth')->group(function (){
    Route::get('admin/dashboard', function (){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('admin/blogs', function (){
        return view('admin.blog');
    });
    Route::resource('admin/category', CategoryController::class);
    Route::resource('admin/product', ProductController::class);
    Route::resource('admin/user', UserController::class);
});

Auth::routes(['register'=>false]);
