<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Add specific items to the current session
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws \Exception
     */

    public function store(Request $request){
        $addToCart = $request->all();
        $product = Product::findOrFail($addToCart['id']);
        $cart = session('cart.products');
        if (!$cart) {
            $cart = [
                [
                    "id" => $addToCart['id'],
                    "product" => $product,
                    "quantity" => 1,
                    "size" => $addToCart['size']
                ]
            ];
            session()->put('cart.products', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        foreach ($cart as $index => $item) {

            if($item['id'] === $addToCart['id'] && $item['size'] === $addToCart['size']){
                $cart[$index]['quantity'] += 1;

                session()->put('cart.products', $cart);

                return redirect()->back()->with('success', 'Product added to basket successfully!');
            }
        }
        array_push($cart, [
            "id" => $addToCart['id'],
            "product" => $product,
            "quantity" => 1,
            "color" => $product->color,
            "size" => $addToCart['size']
        ]);

        session()->put('cart.products', $cart);

        return redirect()->route('products.index');
    }

    /**
     * delete a specific items from the current session
     *
     * @param $id
     * @return RedirectResponse
     */

    public function delete($id){
        session()->forget('cart.products.'.$id);
        return redirect()->route('cart.index');
    }
}
