
@extends('layouts.app')

@section('content')

<div class="container">

  <button type="button" class="btn btn-outline-secondary"><a class="badge badge-light" href="{{route('boutique')}}">Revenir à la boutique</a></button>

  <div class="row my-4">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Polo</strong>

          

            <h3 class="mb-0">{{$product->title}}</h3>
            <div class="mb-1 text-muted">{{$product->getPrice()}}</div>
            <p class="card-text mb-auto">{!!$product->description!!}</p>
            
            <form action="{{route('cart.store')}}" method="POST">
              @csrf
              <input type="hidden" name="product_id" value="{{$product->id}}">
          
              <button type="submit" class="btn btn-dark">Ajouter au panier</button>
            </form>
          
        </div>




        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection