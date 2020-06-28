<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Order $order){

        return view('admin.order.index',['orders'=>$order->get()]);
    }


    public function show($id, Order $order){
        return view('admin.order.show', ['order'=>$order->find($id)]);
    }

    public function delete($id, Order $order, OrderProduct $orderProduct){

        $orderProducts = $orderProduct->where('order_id', $id)->get();

        foreach ($orderProducts as $product){
            $product->delete();
        }

        $current = $order->find($id);
        if ($current) {
            $current->delete();
        }
        return redirect()->route('admin.order.index');
        
    }
}
