<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('admin/dashboard', function (){
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::get('admin/blogs', function (){
    return view('admin.blog');
});

Route::resource('admin/category', CategoryController::class);
Route::resource('admin/product', ProductController::class);