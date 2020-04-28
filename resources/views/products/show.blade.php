@extends('layouts.app')

@section('content')
    <div class="container d-flex w-100 mt-5" >
        <img width="w-50" style=" height: 400px;" style="object-fit: cover"
             src="{{$product->image['0']->name}}">
        <div class="w-50">

        </div>
    </div>
@endsection
