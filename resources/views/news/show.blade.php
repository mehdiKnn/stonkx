@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center pb-3">
            <img src="{{$new->img}}" class="rounded w-100" alt="">
        </div>
        <hr class="w-25">
        <div class="blog-post mb-5 mt-4">
            <h2 class="blog-post-title">{{$new->title}}</h2>
            <p class="blog-post-meta">{{$new->updated_at}} |<a href="#"> {{$new->author}}</a></p>
            <p>{{ $new->content }}</p>
        </div>
        <hr class="w-25">
        <h1 class="mt-4" >Plus d'articles</h1>
        <div id="more-article" class="d-flex flex-row justify-content-between mt-4">
            @foreach($news as $new)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$new->title}}</h5>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('news.show', $new->id)}}" class="btn btn-dark">Lire l'article</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
