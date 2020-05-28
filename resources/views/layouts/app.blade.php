<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Delta Store', 'Delta Store') }}</title>

    
    @yield("extra-script")

    <!-- Scripts -->
    <script src="{{ asset('../resources/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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

      #app{
        margin-top:150px;
      }

      i{
        font-size:1.6em;
      }

      .mainContainer{
        padding:120px !important;
        background-color: rgba(50,50,50);
      }

    </style>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">



</head>
<body>

  <header class="blog-header py-3 border-bottom fixed-top bg-light">
    <div class="row flex-nowrap justify-content-between align-items-center">

      <div class="col-6">
        <img src="img/logoDeltaNoir.png" akt="logoDeltaNoir">
      </div>


      <div class="col-6 d-flex justify-content-center">
        <div class="col-2 d-flex justify-content-center align-items-center">
          <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('home')}}">Accueil</a>
        </div>

        <div class="col-2 d-flex justify-content-center align-items-center">
          <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('boutique')}}">Produits</a>
        </div>

        <div class="col-2 d-flex justify-content-center align-items-center">
          <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('whoarewe')}}">Qui on est ?</a>
        </div>

        <div class="col-2 d-flex justify-content-center align-items-center">
          <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('contact')}}">Contact</a>
        </div>

        <div class="col-2 d-flex justify-content-center align-items-center">
          <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('cart.index')}}">Panier<span class="badge badge-pill badge-dark mx-2 px-2">{{Cart::count()}}</span></a>
        </div>

        <div class="col-2 d-flex justify-content-center align-items-center">
          <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('register')}}">Register</a>
        </div>


    </div>
  </header>


    <div id="app">
      
        <main class="py-4">

          @if (session("success"))
            <div class="alert alert-success">
              {{session("success")}}
            </div>
          @endif

          @if (session("error"))
            <div class="alert alert-danger">
              {{session("error")}}
            </div>
          @endif


            @yield('content')
        </main>
    </div>

    <footer class="blog-footer bg-dark text-white d-flex row  mx-0">

      <div id="siteMap" class="col-6 d-flex flex-column list-group text-white pb-3 pr-0">

          <a class="py-1 text-center text-white" href="{{route('home')}}">Accueil</a>

          <a class="py-1 text-center text-white" href="{{route('boutique')}}">Produits</a>

          <a class="py-1 text-center text-white" href="{{route('whoarewe')}}">Qui on est ?</a>

          <a class="py-1 text-center text-white" href="{{route('contact')}}">Contact</a>

          <a class="py-1 text-center text-white" href="{{route('cart.index')}}">Panier</a>

          <a class="py-1 text-center text-white" href="#">Sign up</a>

      </div>

      <div id="socialNetworks" class="col-6 d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex flex-row mb-3"><i class="fab fa-facebook mr-3 align-self-center"></i><a href="#" class="text-white">Facebook</a></div>
        <div class="d-flex flex-row mb-3"><i class="fab fa-instagram mr-3 align-self-center"></i><a href="#" class="text-white">Instagram</a></div>
        <div class="d-flex flex-row mb-3"><i class="fab fa-snapchat-square mr-3 align-self-center"></i><a href="#" class="text-white">Snapchat</a></div>
      </div>

    </footer>


@yield("extra-js")
<script src="https://kit.fontawesome.com/586aab2eb8.js" crossorigin="anonymous"></script>
</body>
</html>
