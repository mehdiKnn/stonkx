@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div
                class="d-flex flex-column justify-content-end align-items-start ">
                <h1 class="text-center">{{$brand->name}}</h1>
                <h6>{{$brand->description}}</h6>
            </div>
            <img id="noMobile" class="w-100 rounded mt-5"
                 src="/storage/images/brand/{{$brand->banner}}">
        </div>
        <div class="d-flex flex-wrap pt-5 justify-content-between" id="subTwo">
            @foreach($products as $product)
                <div class="card mb-2" id="subProduct">
                    <img style="object-fit: cover"
                         src="/storage/images/sneakers/{{$product->image['0']->name}}"
                         class="card-img-top w-100 h-50" alt="...">
                    <div class="card-body">
                        <h6 class="card-title text-truncate">{{$product->name}}</h6>
                        <p class="card-text text-truncate">{{$product->color}}</p>
                        <p class="card-text font-weight-bold">{{$product->price}}
                            €</p>
                        <a href="#" class="btn btn-dark">See more</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
