@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="card">
            <form class="p-5" method="POST" enctype="multipart/form-data">
                @csrf
                @if(session('notif'))
                    <div class="alert alert-danger">
                        {{session('notif')}}
                    </div>
                @endif
                <div class="row form-group">
                    <div class="col">
                        <label for="author">Nom</label>
                        <input type="text" id="author" name="name"
                               class="form-control" placeholder="Nom"
                               value="@if(isset($products)) {{$products->name}} @elseif(old('name')) {{old('name')}} @endif">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSummary">Description</label>
                    <textarea class="form-control" id="inputSummary" rows="3"
                              name="description" placeholder="Description">
                        @if(isset($products)) {{$products->description}} @elseif(old('description')) {{old('description')}} @endif
                    </textarea>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <label>Prix ( € )</label>
                        <input type="text" name="price" class="form-control"
                               value="@if(isset($products)) {{$products->price}} @elseif(old('price')) {{old('price')}} @endif">
                    </div>
                    <div class="col">
                        <label>Color</label>
                        <input type="text" name="color" class="form-control"
                               value="@if(isset($products)) {{$products->color}} @elseif(old('color')) {{old('color')}} @endif">
                    </div>
                    <div class="col">
                        <label>Brand</label>
                        <select name="brand"
                                class="selectpicker shadow-sm border"
                                data-width="100%">
                            <option selected>Sélectionnez une taille</option>
                            @foreach($brands as $brand)
                                <option
                                    value="{{$brand->id}}" @if($brand->id === $products->brand_id) {{"selected"}} @endif >{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <label>Image n°1</label>
                        <input type="file" name="image1" class="form-control">
                    </div>
                    <div class="col">
                        <label>Image n°2 (optionnelle)</label>
                        <input type="file" name="image2" class="form-control">
                    </div>
                    <div class="col">
                        <label>Image n°3 (optionnelle)</label>
                        <input type="file" name="image3" class="form-control">
                    </div>
                </div>
                @if(isset($products))
                    <div class="alert alert-info">Les fichiers choisit
                        écraserons ceux
                        ci dessous
                    </div>
                    <div class="row form-group">
                        @foreach($products->image as $img)
                            <div class="col">
                                <img width="100" src="{{$img->name}}">
                            </div>
                        @endforeach
                    </div>
                @endif
                <input type="submit" class="btn btn-dark" value="Enregistrer">
            </form>
        </div>

    </div>
@endsection
