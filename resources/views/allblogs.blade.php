@extends('template')

@section('content')

<div class="container mx-auto mt-5 w-100">
    <div class="w-50 mx-auto">
        @if ($message = Session::get('success'))
            <div class="alert alert-danger">
                <strong>
                    {{$message}}
                </strong>
            </div>
        @endif
        <table class="table mb-5 mx-auto">
                <thead class="bg-dark text-light">
                    <tr class="font-weight-bold">
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td><a href="{{route('article', $article->id)}}">{{$article->title}}</a></td>
                        <td>
                        <form method="POST" action="{{route('deletearticle', $article->id)}}">
                            @CSRF
                            <button class="btn btn-outline-dark"> Delete </button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

@endsection
