<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('../resources/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">



</head>
<body>

  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">

      <div class="col-2">
        <img src="img/logoDeltaNoir.png" akt="logoDeltaNoir">
      </div>


      <div class="col-1 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="{{route('home')}}">Accueil</a>
      </div>

      <div class="col-1 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="{{route('boutique')}}">Produits</a>
      </div>

      <div class="col-2 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="{{route('whoarewe')}}">Qui sommes-nous ?</a>
      </div>

      <div class="col-1 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="{{route('contact')}}">Contact</a>
      </div>

      <div class="col-1 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="{{route('cart.index')}}">Panier<span class="badge badge-pill badge-dark">{{Cart::count()}}</span></a>
      </div>

      <div class="col-1 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
      </div>

      <div class="col-1 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="#">{{ session('status') }}</a>
      </div>


    </div>
  </header>


    <div id="app">
      
        <main class="py-4">

          @if (session("success"))
          <div>
            {{session("success")}}
          </div>
              
          @endif

            @yield('content')
        </main>
    </div>

    <footer class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
</body>
</html>
