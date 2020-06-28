@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="d-flex w-100 justify-content-between mb-3">
            <h2>Liste des Marques </h2>
            <a href="{{route('admin.brands.create')}}" class="text-light btn btn-dark">Ajouter une marque</a>
        </div>

        <div class="card">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>

                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <th scope="row">{{$brand->id}}</th>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->created_at}}</td>
                        <td><a href="{{route('admin.brands.show', $brand->id)}}" class="text-light btn btn-dark btn-sm">Modifier</a>
                        </td>
                        <td>
                            <form method="POST" action="/admin/brands/{{$brand->id}}">
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
