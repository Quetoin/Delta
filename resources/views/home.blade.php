@extends('layouts.app')

@section('content')
<div class="container">

  @if (session('status'))
  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Votre session</div>

            <div class="card-body">
              <div>
                {{ session('status') }}
              </div>
            </div>
        </div>
    </div>
  </div>
  @endif

  <div class="row jumbotron text-white rounded mb-5 mainContainer">
    <div class="col-md-12 px-0 d-flex justify-content-center">
      <h1 class="display-4 font-italic align-self-center">Delta store.</h1>
      <figure class="mx-0"><img src="img/logoDeltaBlanc.png" style="width:193px;height:173px;border-radius:8px;"></figure>
    </div>
  </div>


  <div class="row mb-5">
    <div class="col-md-12">
      <div class="row no-gutters overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative text-center">
        <h2>Voici un petit aperçu de nos produits ci-dessous, allez sur la page <a href="{{route('boutique')}}">produits</a> pour en voir plus</h2>
      </div>
    </div>
  </div>

  <div class="row mb-2">
    @foreach ($products as $product)
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">


        
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Polo</strong>
            <h3 class="mb-0">{{$product->title}}</h3>
            <div class="mb-1 text-muted">{{$product->getPrice()}}</div>
            <p class="card-text mb-auto">{{$product->description}}</p>
            <a href="{{route('products.show', $product->slug)}}" class="stretched-link">Voir l'article</a>
        </div>

        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>

      </div>
    </div>
    @endforeach
  </div>

</div>
@endsection
