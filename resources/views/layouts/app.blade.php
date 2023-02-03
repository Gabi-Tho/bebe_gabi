<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ config('app.name')}} @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<header>
<nav class="navbar sticky-top navbar-light bg-light">
  <a class="navbar-brand" href="#">bebe nav</a>
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