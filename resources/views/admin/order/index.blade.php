@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="d-flex w-100 justify-content-between mb-3">
            <h2>Liste des Commandes </h2>
        </div>

        <div class="card">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">N° de commande</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->number}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->created_at}}</td>
                        <td><a href="{{route('admin.order.show', $order->id)}}" class="text-light btn btn-dark btn-sm">Modifier</a>
                        </td>
                        <td>
                            <form method="POST" action="/admin/order/{{$order->id}}">
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
