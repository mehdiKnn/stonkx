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
                               value="@if(isset($brands)) {{$brands->name}} @elseif(old('name')) {{old('name')}} @endif">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSummary">Description</label>
                    <textarea class="form-control" id="inputSummary" rows="3"
                              name="description" placeholder="Description">
                        @if(isset($brands)) {{$brands->description}} @elseif(old('description')) {{old('description')}} @endif
                    </textarea>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control">
                    </div>
                    <div class="col">
                        <label>Banniére</label>
                        <input type="file" name="banner" class="form-control">
                    </div>
                </div>
                @if(isset($brands))
                <div class="alert alert-info">Les fichiers choisit écraserons ceux
                    ci dessous
                </div>
                <div class="row form-group">
                    <div class="col">
                        <img width="100" src="{{$brands->banner}}">
                    </div>
                    <div class="col">
                        <img width="100" src="{{$brands->image}}">
                    </div>
                </div>

                @endif
                <input type="submit" class="btn btn-dark" value="Enregistrer">
            </form>
        </div>

    </div>
@endsection
