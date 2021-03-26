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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        <form method="POST" action="{{route('deleteuser', $user->id)}}">
                            @CSRF
                            @if(Auth::user()->name == $user->name)
                            <button class="btn btn-outline-dark" disabled> Delete </button>
                            @else
                            <button class="btn btn-outline-dark"> Delete </button>
                            @endif
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

@endsection
