@extends('template')

<!------ Include the above in your HEAD tag ---------->
@section('content')

<div class="main mt-5 mx-auto w-50">
<div class="container box mb-5 shadow-lg p-4">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h1 class="h3 pt-3 mb-5 text-center">Log In</h1>
        <div class="form-group">
                    <label class="font-weight-light">Role</label>
                    <select class="custom-select" id="role" name="role">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                    </select>
                    @if ($errors->has('category'))
                        <div class="help-block text-danger">
                            {{$errors->first('category')}}
                        </div>
                    @endif
                </div>
        <div class="form-group">
            <label class="font-weight-lighter">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        </div>
        <div class="form-group">
            <label class="font-weight-lighter">Password</label>
            <input type="password" name="password"  class="form-control" placeholder="Password" required>
        </div>
        <div class="checkbox mb-3 font-weight-light">
            <label>
                <input type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-dark btn-block" type="submit">Sign in</button>
        <p class="mt-3 mb-3 text-muted">Don't have an account? <a href="{{route('register')}}">Sign up</a></p> 
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <strong>
                    {{$message}}
                </strong>
            </div>
        @endif
        <p class="mt-3 mb-3 text-muted">&copy; 2020-2021</p>
    </form>
</div>
</div>
@endsection