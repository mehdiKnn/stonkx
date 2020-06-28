@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="d-flex w-100 justify-content-between mb-3">
            <h2>Liste des utilisateurs </h2>
            <a href="{{route('admin.user.create')}}" class="text-light btn btn-dark">Ajouter un utilisateur</a>
        </div>

        <div class="card">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Status</th>
                    <th scope="col">Dernière modifications</th>
                    <th scope="col">Actions</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        @if($user->admin == 1)
                            <td>Administrateur</td>
                        @else
                            <td>Client</td>
                        @endif
                        <td>{{$user->updated_at}}</td>
                        <td><a href="{{route('admin.user.edit', $user->id)}}" class="text-light btn btn-dark btn-sm">Modifier</a>
                        </td>
                        <td>
                            <form method="POST" action="/admin/user/{{$user->id}}">
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

