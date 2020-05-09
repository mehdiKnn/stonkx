@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex" id="subTwo">
        <div class="w-50" id="subFocus">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    @foreach($product->image as $key=>$img)
                        <li data-target="#demo"
                            data-slide-to="{{$key}}"></li>
                    @endforeach
                </ul>
                <div class="carousel-inner carousel-inside">
                    @foreach($product->image as $key=>$img)
                        @if($key === 0)
                            <div class="carousel-item active text-center">
                                @else
                                    <div class="carousel-item text-center">
                                        @endif
                                        <img class="shadow-sm carousel-img"
                                             src="{{$img->name}}">
                                    </div>
                                    @endforeach
                            </div>
                </div>
                <div class="pt-4" id="preview">
                    @foreach($product->image as $img)
                        <img class="border carousel-preview"
                             src="{{$img->name}}">
                    @endforeach
                </div>
            </div>
            <div class="w-50" id="subFocus">
                <div class="card-body">
                    <h5 class="card-title text-uppercase font-weight-bold">{{$product->brand->name}}</h5>
                    <h3 class="card-title text-uppercase font-weight-bold">{{$product->name}}</h3>
                    <h6 class="card-title text-uppercase text-muted">{{$product->color}}</h6>
                    <h3 class="card-title text-uppercase font-weight-bold">{{$product->price}}€</h3>
                    <h6 class="card-title text-muted">TVA comprise, plus frais d'exédition</h6>
                    <select class="selectpicker shadow-sm border" data-width="100%">
                        <option selected>Sélectionnez une taille</option>
                        <option value="1" disabled>(EU 37,5 - US 5)</option>
                        <option value="2">EU 38 - US 5,5</option>
                        <option value="3">EU 38,5 - US 6</option>
                        <option value="3">EU 39 - US 6,5</option>
                        <option value="3" disabled>(EU 40 - US 7)</option>
                        <option value="3">EU 40,5 - US 7,5</option>
                        <option value="3">EU 41 - US 8</option>
                        <option value="3">EU 42 - US 8,5</option>
                        <option value="3" disabled>(EU 42,5 - US 9)</option>
                        <option value="3">EU 43 - US 9,5</option>
                        <option value="3">EU 44 - US 10</option>
                        <option value="3">EU 44,5 - US 10,5</option>
                        <option value="3">EU 45 - US 11</option>
                        <option value="3">EU 45,5 - US 11,5</option>
                        <option value="3">EU 46 - US 12</option>
                        <option value="3" disabled>(EU 47 - US 12,5)</option>
                        <option value="3">EU 47,5 - US 13</option>
                        <option value="3">EU 48,5 - US 14</option>
                        <option value="3" disabled>(EU 49,5 - US 15)</option>
                    </select>
                    <button class="btn btn-dark mt-3">Ajouter au panier</button>
                    <h6 class="w-100 mt-3 pb-2 card-title text-uppercase font-weight-bold border-bottom">Description</h6>
                    <p>{{$product->description}}</p>
                </div>

            </div>
        </div>
    </div>
@endsection
