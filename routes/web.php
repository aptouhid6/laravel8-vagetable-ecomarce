<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Front\PaymentController;

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
Route::get('order/status/{status}',[CheckoutController::class,'final_status'])->name('front.order.status');
Route::get('order/{id}/payment',[PaymentController::class,'index'])->name('front.order.payment');
Route::get('order/{id}/pay_now',[PaymentController::class,'pay_now'])->name('front.order.pay_now');
Route::post('payment/success',[PaymentController::class,'success'])->name('front.order.payment.success');
Route::post('payment/failed',[PaymentController::class,'failed'])->name('front.order.payment.failed');
Route::post('payment/cancel',[PaymentController::class,'cancel'])->name('front.order.payment.cancel');

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
    Route::get('admin/orders',[OrderController::class,'index'])->name('admin.order.index');
    Route::get('admin/orders/{id}/show',[OrderController::class,'show'])->name('admin.order.show');
    Route::put('admin/orders/{id}/{status}',[OrderController::class,'change_status'])->name('admin.order.change.status');
});

Auth::routes(['register'=>false]);
