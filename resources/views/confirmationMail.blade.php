
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

            <tbody>
            @foreach($products as $product)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-10">
                                <h6 class="nomargin">{{$product['product']['name']}}</h6>
                                <p>{{$product['product']['color']}}</p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">
                        <h6>{{$product['product']['price']}}€</h6>
                    </td>
                    <td data-th="Quantity">
                        <h6 class="text-center">{{$product['quantity']}}</h6>
                    </td>
                    <td data-th="Subtotal" class="text-center">
                        <h6>{{$product['product']['price'] * $product['quantity']}}
                            €</h6></td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td>
                </td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>
                        @php($total = 0)
                        @foreach($products as $product)
                            @php($total += $product['product']['price'] * $product['quantity'])
                        @endforeach
                        {{$total}}€</strong></td>
                <td></td>
            </tr>
            </tfoot>
    </table>

