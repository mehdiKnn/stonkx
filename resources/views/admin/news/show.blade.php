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
                        <label for="author">Auteur</label>
                        <input type="text" id="author" name="author"
                               class="form-control" placeholder="Auteur"
                               value="@if(isset($news)) {{$news->author}} @elseif(old('author')) {{old('author')}} @endif">
                    </div>
                    <div class="col">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title"
                               class="form-control" placeholder="adresse mail"
                               value="@if(isset($news)) {{$news->title}} @elseif(old('title')) {{old('title')}} @endif">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSummary">Résumé</label>
                    <textarea class="form-control" id="inputSummary" rows="3"
                              name="summary">
                        @if(isset($news)) {{$news->summary}} @elseif(old('summary')) {{old('summary')}} @endif
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="inputContent">Contenu</label>
                    <textarea class="form-control" id="inputContent" rows="3"
                              name="contenu">
                        @if(isset($news)) {{$news->content}} @elseif(old('contenu')) {{old('contenu')}} @endif
                    </textarea>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="col">
                        <input type="date" name="release_date"
                               class="form-control"
                               value="@if(isset($news)) {{$news->release_date}} @elseif(old('release_date')) {{old('release_date')}} @endif">
                    </div>
                    @if(isset($news))
                </div>
                <div class="alert alert-info">Le fichier choisit écrasera celui
                    ci dessous
                </div>
                <div class="row form-group">

                    <div class="col">
                        <img width="100" src="{{$news->img}}">
                    </div>
                    <div class="col">

                    </div>
                </div>

                @endif

                <input type="submit" class="btn btn-dark" value="Enregistrer">
            </form>
        </div>

    </div>
@endsection
