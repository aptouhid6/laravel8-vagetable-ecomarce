<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontController extends Controller
{
    public function home(){
        // dd('yes');
        $data['featured_products'] = Product::where('is_featured',1)->limit(8)->get();
        return view('front.home',$data);
    }
}
