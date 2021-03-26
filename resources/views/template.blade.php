<!DOCTYPE html>
<html lang>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wonderful Journey</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css">
        <script>
        function getFileName() {
            var fileName = document.getElementById('img').files[0].name;
            var label = document.getElementById('fileLabel').innerHTML = fileName;
        }
    </script>
    </head>
    <body>
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container font-weight-bolder text-center">
            <h1 class="display-1">Wonderful Journey</h1>
            <p class="lead">Blog of Indonesia Tourism</p>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mx-5">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home<span class="sr-only">(current)</span></a>
            </li>
            @guest
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item bg-dark text-light" href="{{route('category', 1)}}">Beach</a>
                    <a class="dropdown-item bg-dark text-light" href="{{route('category', 2)}}">Mountain</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
            </li>
            @endguest
            @if (Auth::user() && Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin')}}">Admin</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Manage User
                </a>
                <div class="dropdown-menu bg-dark" style="border:none;" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item bg-dark text-light" href="{{route('user')}}">User</a>
                    <a class="dropdown-item bg-dark text-light" href="{{route('allblog')}}">Blog</a>
                </div>
            </li>
            @elseif (Auth::user())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('update')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog')}}">Blog</a>
                </li>
            @endif
            </ul>
            <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Sign Up 👤</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Log in 🚪</a>
            </li>
            @else
            <form method="POST" action="{{route('logout')}}">
                @CSRF
                <button class="btn-link btn nav-link">Log Out 🚪</button>
            </form>
            @endguest
            </ul>
        </div>
    </nav>
        @yield('content')
        @yield('footer')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
