<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ config('app.name')}} @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
</head>

<header>
@php $locale = session()->get('locale'); @endphp
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hola @if(Auth::check()) {{Auth::user()->name}} @else Guest @endif</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">

    @guest

            <a class="nav-link" href="{{route('user.create')}}">Registration</a>
            <a class="nav-link" href="{{ route('login')}}">Login</a>
    @else
            <a class="nav-link" href="{{ route('blog.index') }}">Blogs</a>
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
    @endguest
            <a class="nav-link @if($locale == 'en') bg-primary @endif " href="{{ route('lang', 'en') }}">EN</a>
            <a class="nav-link" href="{{ route('lang', 'fr') }}">FR</a>

      </div>
    </div>
  </div>
</nav>
</header>


<body>
    @yield('content')
</body>





<footer class="bg-dark text-center text-white fixed-bottom">
  <div class="text-center p-3" >
    © 2023 Copyright: Gabi 
    <a class="text-white" href="https://mdbootstrap.com/">yeehaw.com</a>
  </div>
</footer>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</html>