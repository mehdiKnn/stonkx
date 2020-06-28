@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="d-flex w-100 justify-content-between mb-3">
            <h2>Liste des News </h2>
            <a href="{{route('admin.news.create')}}" class="text-light btn btn-dark">Ajouter une news</a>
        </div>

        <div class="card">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Date de publication</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>

                </tr>
                </thead>
                <tbody>
                @foreach($news as $new)
                    <tr>
                        <th scope="row">{{$new->id}}</th>
                        <td>{{$new->title}}</td>
                        <td>{{$new->author}}</td>
                        <td>{{$new->created_at}}</td>
                        <td>{{$new->release_date}}</td>
                        <td><a href="{{route('admin.news.show', $new->id)}}" class="text-light btn btn-dark btn-sm">Modifier</a>
                        </td>
                        <td>
                            <form method="POST" action="/admin/news/{{$new->id}}">
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
