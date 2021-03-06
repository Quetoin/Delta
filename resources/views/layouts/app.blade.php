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
    <script src="{{ asset('/js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/appPerso.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">



</head>
<body>

  <div id="app">

    <header class="blog-header py-3 border-bottom fixed-top bg-light">

      <div class="row flex-nowrap justify-content-between align-items-center" id="navbar">

        <div class="col-2">
          <img src="{{asset('img/logoDeltaNoir.png')}}" akt="logoDeltaNoir">
        </div>


        <div class="btn-group d-none mr-4" id="mobileMenu">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Menu
          </button>
          <div class="dropdown-menu dropdown-menu-center">
            <button class="dropdown-item" type="button"><a href="{{route('home')}}">Accueil</a></button>

            <button class="dropdown-item" type="button"><a href="{{route('boutique')}}">Produits</a>
            </button>
            
            <button class="dropdown-item" type="button"><a href="{{route('whoarewe')}}">Qui on est ?</a></button>
            
            <button class="dropdown-item" type="button"><a href="{{route('contact')}}">Contact</a></button>
            
            <button class="dropdown-item" type="button"><a href="{{route('cart.index')}}">Panier<span class="badge badge-pill badge-dark mx-2 px-2">{{Cart::count()}}</span></a></button>
          </div>
        </div>


        <div class="col-9 d-flex justify-content-center" id="menuDesktop">
          <div class="col-2 d-flex justify-content-center align-items-center menuDesktop-col">
           
            <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('home')}}">Accueil</a>
          </div>

          <div class="col-2 d-flex justify-content-center align-items-center menuDesktop-col">
            <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('boutique')}}">Produits</a>
          </div>

          <div class="col-2 d-flex justify-content-center align-items-center menuDesktop-col">
            <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('whoarewe')}}">Qui on est ?</a>
          </div>

          <div class="col-2 d-flex justify-content-center align-items-center menuDesktop-col">
            <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('contact')}}">Contact</a>
          </div>

          <div class="col-2 d-flex justify-content-center align-items-center menuDesktop-col">
            <a class="btn btn-sm btn-outline-secondary py-2 px-3" href="{{route('cart.index')}}">Panier<span class="badge badge-pill badge-dark mx-2 px-2">{{Cart::count()}}</span></a>
          </div>


                    <!-- Authentication Links -->
          
          @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
          @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('orders') }}">Mes commandes</a>

                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
          @endguest
 
        </div>
    </header>


          <main class="py-4">
              @yield('content')

          </main>

      <footer class="blog-footer bg-dark text-white d-flex row  mx-0" style="margin-top:100px;">

          <div id="siteMap" class="col-6 d-flex flex-column list-group text-white pb-3 pr-0">

              <a class="py-1 text-center text-white" href="{{route('home')}}">Accueil</a>

              <a class="py-1 text-center text-white" href="{{route('boutique')}}">Produits</a>

              <a class="py-1 text-center text-white" href="{{route('whoarewe')}}">Qui on est ?</a>

              <a class="py-1 text-center text-white" href="{{route('contact')}}">Contact</a>

              <a class="py-1 text-center text-white" href="{{route('cart.index')}}">Panier</a>

              <a class="py-1 text-center text-white" href="{{route('voyager.dashboard')}}">Administrateur</a>

          </div>

          <div id="socialNetworks" class="col-6 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-row mb-3"><i class="fab fa-facebook mr-3 align-self-center"></i><a href="#" class="text-white">Facebook</a></div>
            <div class="d-flex flex-row mb-3"><i class="fab fa-instagram mr-3 align-self-center"></i><a href="#" class="text-white">Instagram</a></div>
            <div class="d-flex flex-row mb-3"><i class="fab fa-snapchat-square mr-3 align-self-center"></i><a href="#" class="text-white">Snapchat</a></div>
          </div>

      </footer>

  </div>


@yield("extra-js")
<script src="https://kit.fontawesome.com/586aab2eb8.js" crossorigin="anonymous"></script>

</body>
</html>
