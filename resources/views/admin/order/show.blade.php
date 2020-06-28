@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="d-flex w-100 justify-content-between mb-3">
            <h2>Commande n° {{$order->number}} </h2>
        </div>
        <div class="card">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->product as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}} €</td>
                        <td>{{$product->created_at}}</td>
                        <td>
                            <form method="POST" action="/admin/orderproduct/{{$product->pivot->id}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="Supprimer">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
