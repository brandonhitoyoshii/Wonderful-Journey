@extends('template')

@section('content')
<div class="main mt-5 mx-5" style="height:550;">
    @guest
    <div class="row">
    @foreach($article as $articles)
    <div class="col-md-4 my-5">
        <div class="card" style="border:none;">
            <div class="card-body">
                <h5 class="card-title">{{$articles->title}}</h5>
                <p class="card-text">{{mb_strimwidth($articles->description, 0, 80, ".....")}}<a href="{{route('article', $articles->id)}}" style="text-decoration: none;">view full story</a></p>
                <p class="card-text"><small class="text-muted"><em>Category: <a href="{{route('category', $articles->category_id)}}">{{$articles->category->name}}</a></em></small></p>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    @endguest
    @if(Auth::user())
    <h5 class="card-title text-center">Welcome, {{Auth::user()->name}}</h5>
    @endif
</div>

@endsection
