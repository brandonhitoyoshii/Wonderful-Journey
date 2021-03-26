@extends('template')

@section('content')
<div class="main mt-5 mx-auto w-50" style="height:650px;">
    <div class="container box shadow-lg p-3">
        <form class="form-signin" method="POST" action="{{ route('registerblog') }}" enctype='multipart/form-data'>
            {{ csrf_field() }}
                <h1 class="h3 mb-2 text-center mb-4">New Blog</h1>
                <div class="form-group">
                    <label class="font-weight-light">Title</label>
                    <input type="text" name="title" value="{{ old('title')}}" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" placeholder="Enter title" required autofocus>
                    @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        The name must be at least 6 characters. 
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-light">Category</label>
                    <select class="custom-select" id="category" name="category">
                        <option selected value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <div class="help-block text-danger">
                            {{$errors->first('category')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-light">Image</label>
                    <div class="custom-file" style="overflow:hidden;">
                        <input type="file" class="custom-file-input" id="img" name="img" onchange="getFileName()">
                        <label class="custom-file-label text-muted" id="fileLabel" for="image">Choose image file (jpg, png, gif)</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="font-weight-light">Story</label>
                    <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" required></textarea>
                    @if ($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description')}}
                    </div>
                    @endif
                </div>
                <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Register</button>
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
