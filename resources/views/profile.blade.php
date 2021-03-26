@extends('template')

@section('content')
<div class="main mt-5 mx-auto w-50" style="height:550px;">
    <div class="container box shadow-lg p-3">
        <form class="form-signin" method="POST" action="{{ route('update') }}">
            {{ csrf_field() }}
                <h1 class="h3 mb-2 text-center mb-4">Update Profile</h1>
                <div class="form-group">
                    <label class="font-weight-light">Name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="Must be min. 6 chars" required autofocus>
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        The name must be at least 6 characters. 
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-light">Email</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email address" required>
                    @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-light">Phone</label>
                    <input type="text" name="phone" value="{{$user->phone}}" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" placeholder="Phone Number" required>
                    @if ($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone')}}
                    </div>
                    @endif
                </div>
                <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Update</button>
                @if ($message = Session::get('success'))
                    <div class="alert alert-dark w-100 text-center mt-3" >
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
