<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;


class CheckoutController extends Controller
{
    public function checkout(){
        return view('front.checkout');
    }
    public function success(){
        return view('front.success');
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'first_name'      => 'required',
            'last_name'       => 'required',
            'country'         => 'required',
            'street_address'  => 'required',
            'city'            => 'required',
            'zip_code'        => 'required',
            'phone'           => 'required',
            'email'           => 'required',
            'payment_method'    => 'required',
        ]);

        $order = new Order();
        $order->order_id = 'O-'.time();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->country = $request->country;
        $order->street_address = $request->street_address;
        $order->city = $request->city;
        $order->zip_code = $request->zip_code;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->payment_method = $request->payment_method;
        if($request->payment_method != 'card'){
            $order->status = Order::STATUS_PROCESSING;
        }
        $order->total_amount = 0;
        $order->save();

        foreach (session('cart') as $product_id=>$cart){
            $order_detail  = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $product_id; 
            $order_detail->quantity = $cart['quantity']; 
            $order_detail->price = $cart['price']; 
            $order_detail->sub_total = $cart['quantity'] * $cart['price'];
            $order_detail->save(); 
            $order->total_amount += $cart['quantity'] * $cart['price'];
        }
        $order->save();
        session()->remove('cart');
        if($order->status == Order::STATUS_PENDING){
            return redirect()->route('front.order.success');
        }else{
            return redirect()->route('front.order.payment',$order->id);
        }
        // return redirect()->route('front.order.success');
    }
}
