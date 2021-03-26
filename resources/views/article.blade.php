@extends('template')

@section('content')
<div class="main mt-5 mx-5" style="height:650px;">
    <div class="card-deck">
    <div class="col-md-4 my-5">
        <div class="card" style="border:none;">
            <div class="card-body">
                <h5 class="card-title">{{$article->title}}</h5>
                <img src="{{asset('storage/' . $article->image)}}" class="card-img-top">
                <p class="card-text">{{$article->description}}</p>
                <p class="card-text"><small class="text-muted"><em>Category: <a href="{{route('category', $article->category_id)}}">{{$article->category->name}}</a></em></small></p>
                <a class="btn text-light px-5 mt-3 btn-dark" href="{{URL()->Previous()}}">Back</a>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
