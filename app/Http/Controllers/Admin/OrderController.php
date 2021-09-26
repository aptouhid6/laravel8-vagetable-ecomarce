<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Mail\OrderCanceled;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request){
        // if(!auth()->user()->isAdmin){
        //     return redirect()->back();
        // }
        // dd(\request()->all());
        $data['title'] = 'Order List';
        $append = [];
        $order = new Order();
        if($request->client_information != null){
            $order = $order->where(function($query) use ($request){
                $query->where('first_name','Like','%'.$request->client_information.'%')
                ->orWhere('last_name','Like','%'.$request->client_information.'%')
                ->orWhere('phone','Like','%'.$request->client_information.'%')
                ->orWhere('email','Like','%'.$request->client_information.'%');
            });
            $append['client_information'] = $request->client_information;
        }
        if($request->order_id != null){
            $order = $order->where('order_id','Like','%'.$request->order_id.'%');
            $append['order_id'] = $request->order_id;
        }
        if($request->status != null){
            $order = $order->where('status',$request->status);
            $append['status'] = $request->status;
        }
        $order = $order->orderBy('id','desc')->paginate(10);
        $data['orders'] = $order->appends($append);
        // $data['orders'] = Order::orderBy('id','desc')->paginate(10);
        return view('admin.order.index', $data);
    }
    public function show($id){
        $data['title'] = 'Order details';
        // $data['order'] = Order::with('order_details')->findOrFail($id); //relations
        // dd($data);
        $data['order'] = Order::with(['order_details' => function($quary){
            return $quary->with(['product' => function($product){
                return $product->with(['category']);
            }]);
        }])->findOrFail($id); //dui ta relations
        // dd($data);
        return view('admin.order.show', $data);
    }
    public function change_status($order_id,$order_status){
        $order = Order::findOrFail($order_id);
        $order->status = $order_status;
        $order->save();
        if($order_status==Order::STATUS_SHIPPED){
            Mail::to($order->email)->send(new OrderShipped($order));
        }
        if($order_status==Order::STATUS_CANCELED){
            Mail::to($order->email)->send(new OrderCanceled($order));
        }
        session()->flash('message','Order status changed successfully');
        return redirect()->back();
    }
}
  