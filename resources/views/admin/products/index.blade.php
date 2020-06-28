@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="d-flex w-100 justify-content-between mb-3">
            <h2>Liste des Produits </h2>
            <a href="{{route('admin.products.create')}}" class="text-light btn btn-dark">Ajouter un produit</a>
        </div>

        <div class="card">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Publié</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>

                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->brand->name}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->active}}</td>
                        <td><a href="{{route('admin.products.show', $product->id)}}" class="text-light btn btn-dark btn-sm">Modifier</a>
                        </td>
                        <td>
                            <form method="POST" action="/admin/products/{{$product->id}}">
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
        <div class="w-100 mt-3 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
