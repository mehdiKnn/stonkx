@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <h2 class="mb-3">Ajouter un utilisateur</h2>
        <div class="card">
            <form method="post" class="p-5">
                @csrf
                @if(session('notif'))
                    <div class="alert alert-danger">
                        {{session('notif')}}
                    </div>
                @endif
                <div class="row form-group">
                    <div class="col">
                        <label for="fullname">Nom Prénom</label>
                        <input type="text" id="fullname" name="fullname"
                               class="form-control" placeholder="Nom Prénom"
                               value="@if(isset($user)) {{$user->name}} @elseif(old('fullname')) {{old('fullname')}} @endif">
                    </div>
                    <div class="col">
                        <label for="mail">Adresse mail</label>
                        <input type="text" id="mail" name="mail"
                               class="form-control" placeholder="adresse mail"
                               value="@if(isset($user)) {{$user->email}} @elseif(old('mail')) {{old('mail')}} @endif">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Adresse</label>
                    <input type="text" name="address" class="form-control"
                           id="inputAddress" placeholder="22 rue John Doe"
                           value="@if(isset($user)) {{$user->address}} @elseif(old('address')) {{old('address')}} @endif">
                </div>
                <div class="form-row form-group">
                    <div class="col-5">
                        <label for="Ville">Ville</label>
                        <input type="text" id="Ville" class="form-control"
                               placeholder="Ville">
                    </div>
                    <div class="col">
                        <label for="Région">Région</label>
                        <input type="text" id="Région" class="form-control"
                               placeholder="Région">
                    </div>
                    <div class="col">
                        <label for="Postal">Code Postal</label>
                        <input type="text" id="Postal" class="form-control"
                               placeholder="Code Postal">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password"
                               class="form-control" placeholder="**********">
                    </div>
                    <div class="col">
                        <label for="role">Role</label>
                        <select name="role" class="custom-select">
                            <option value="1">Administrateur</option>
                            <option value="0">Client</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-dark" value="Enregistrer">
            </form>
        </div>
    </div>
@endsection
