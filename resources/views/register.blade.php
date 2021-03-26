@extends('template')

@section('content')
<div class="main mt-5 mx-auto w-50" style="height:650px;">
    <div class="container box shadow-lg p-3">
        <form class="form-signin" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
                <h1 class="h3 mb-2 text-center mb-4">Registration Form</h1>
                <div class="form-group">
                    <label class="font-weight-light">Name</label>
                    <input type="text" name="name" value="{{ old('name')}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="Must be min. 6 chars" required autofocus>
                    @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        The name must be at least 6 characters. 
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-light">Email</label>
                    <input type="email" name="email" value="{{ old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email address" required>
                    @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-light">Password</label>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="Must be min. 8 chars and alphanumeric" required>
                    @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-light">Password Confirmation</label>
                    <input type="password"  name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : ''}}" placeholder="Must be same as password" required>
                    @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password_confirmation')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-light">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone')}}" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" placeholder="Phone Number" required>
                    @if ($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone')}}
                    </div>
                    @endif
                </div>
                <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Register</button>
                <p class="mt-3 mb-3 text-muted">&copy; 2020-2021</p>
        </form>
    </div>
</div>

@endsection
