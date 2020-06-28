<?php

namespace App\Http\Controllers;

use App\Mail\mailOrder;
use App\Mail\MailTrap;
use App\Order;
use App\OrderProduct;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
use function GuzzleHttp\Promise\queue;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('checkout.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $token = bin2hex(openssl_random_pseudo_bytes(4));
        $products = session('cart.products');

        $order = new Order();
        $order->number = $token;
        $order->user_id = Auth::user()->id;
        $order->save();

        foreach ($products as $product) {
            if ($product['quantity' ]> 1){
                for ($i = 1; $i<= $product['quantity']; $i++ ){
                    $order_product = new OrderProduct();
                    $order_product->order_id = $order->id;
                    $order_product->product_id = $product['product']['id'];
                    $order_product->save();
                }
            }else{
                $order_product = new OrderProduct();
                $order_product->order_id = $order->id;
                $order_product->product_id = $product['product']['id'];
                $order_product->save();
            }
        }

        Mail::to('mehdi.kannouni@hotmail.fr')->send(new mailOrder($token, session('cart.products')));
        session()->forget('cart.products');
        return view('checkout.confirm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Order  $order
     * @return Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
