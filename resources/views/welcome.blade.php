@extends('layouts.app')

@section('content')
    <div class="container-sm">
        <div id="topSide">
            <div id="subOne">
                <h1 class="text-muted">Shop</h1>
                <h1>Sneakers</h1>
                <span class="mb-3">Choose between 40+ sneakers selected by sneakerheads from around the world</span>
                <a class="btn btn-dark" href="{{route('products.index')}}"> Browse</a>
            </div>
            <img id="subImg"
                 src="{{$products['7']->image['0']->name}}">
        </div>
        <div class="d-flex flex-wrap justify-content-between align-items-start pt-5" id="subTwo">
            @foreach($products as $product)
                <div class="card mb-5" id="subProduct">
                    <img style="object-fit: cover"
                         src="{{$product->image['0']->name}}"
                         class="card-img-top w-100 h-50" alt="...">
                    <div class="card-body">
                        <h6 class="card-title text-truncate">{{$product->name}}</h6>
                        <p class="card-text text-truncate">{{$product->color}}</p>
                        <p class="card-text font-weight-bold">{{$product->price}}
                            €</p>
                        <a href="{{route('products.show', $product->id)}}" class="btn btn-dark">See more</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
