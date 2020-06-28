@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h1>Votre panier</h1>
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
                </thead>
                @if(session('cart.products'))
                    <tbody>
                    @foreach(session('cart.products') as $key => $products)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <h4 class="nomargin"><a class="text-dark" href="{{route('products.show', $products['product']['id'])}}">{{$products['product']['name']}}</a></h4>
                                        <p>{{$products['product']['color']}}</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">
                                <h5>{{$products['product']['price']}} €</h5>
                            </td>
                            <td data-th="Quantity">
                                <input type="number"
                                       class="form-control text-center"
                                       value="{{$products['quantity']}}">
                            </td>
                            <td data-th="Subtotal" class="text-center">
                                <h5>{{$products['product']['price'] * $products['quantity']}}
                                    €</h5></td>
                            <td class="actions" data-th="">

                                <a href="{{route('cart.delete', $key)}}"  class="text-light btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td><a href="{{route('products.index')}}"
                               class="btn btn-warning"><i
                                    class="fa fa-angle-left"></i> Continue
                                Shopping</a>
                        </td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total
                                @php($total = 0)
                                @foreach(session('cart.products') as $product)
                                    @php($total += $product['product']['price'] * $product['quantity'])
                                @endforeach
                                {{$total}} €</strong></td>
                        <td><a href="{{route('checkout.index')}}"
                               class="btn btn-dark btn-block">Checkout
                                <i class="fa fa-angle-right"></i></a></td>
                    </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>
@endsection
