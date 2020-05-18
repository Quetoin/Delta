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

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <figure><img src="../img/logoDeltaNoir.png" alt="Delta"></figure>
            <ul>
              <li><a href="{{route('home')}}">Accueil</a></li>
              <li><a href="{{route('boutique')}}">Produits</a></li>
              <li><a href="{{route('whoarewe')}}">Qui sommes-nous ?</a></li>
              <li><a href="{{route('contact')}}">Contact</a></li>
              <li><a href="{{route('cart.index')}}">Panier<span class="badge badge-pill badge-dark">{{Cart::count()}}</span></a></li>
                    <li>{{ session('status') }}</li>




            </ul>
        </nav>

        <main class="py-4">

          @if (session("success"))
          <div>
            {{session("success")}}
          </div>
              
          @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
