@extends('layouts.app')

@section('content')
    <div class="container">
        <div
            class="d-flex flex-column justify-content-end align-items-start ">
            <h1 class="text-center">StonkX</h1>
            <h5>Coming from the idea of applying stock market rules to the
                streetwear resell market, we offer you the best streetwear at
                the best price !</h5>
        </div>
        <h1 class="mt-5">Our Brands ({{sizeof($brands)}})</h1>
        <div class="d-flex justify-content-between mt-5">
            @foreach($brands as $brand)
                <a style="width: 15%" href="{{route('brand.show', $brand->id)}}">
                    <img  class="rounded-lg border p-2 w-100"  src="{{$brand->image}}">
                </a>

            @endforeach
        </div>
        <h1 class="mt-5">
            Our Product ({{sizeof($products)}})
        </h1>
        <div class="d-flex flex-wrap justify-content-between pt-5" id="subTwo">
            @foreach($products as $product)
                <div class="card mb-5" id="subProduct">
                    <img style="object-fit: cover"
                         src="{{$product->image['0']->name}}"
                         class="card-img-top w-100 h-50" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-truncate">{{$product->name}}</h5>
                        <p class="card-text text-truncate">{{$product->color}}</p>
                        <p class="card-text font-weight-bold">{{$product->price}}
                            €</p>
                        <a href="{{route('products.show', $product->id)}}" class="btn btn-dark">See more</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-100 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
