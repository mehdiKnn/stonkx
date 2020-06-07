@extends('layouts.app')

@section('content')
    <div class="container">
        <div
            class="d-flex flex-column justify-content-end align-items-start mb-5">
            <h1 class="text-center">News</h1>
            <h5>Here we gather every news about sneaker world from basketball to designer everything you need is below !</h5>
        </div>
        <div>
            @foreach($news as $new)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{$new->img}}" class="card-img news-img" style="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$new->title}}</h5>
                                <p class="card-text">{{$new->summary}}</p>
                                <p class="card-text"><small class="text-muted">{{$new->updated_at}}</small></p>
                                <a href="{{route('news.show', $new->id)}}" class="btn btn-dark">See more</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
