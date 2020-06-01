
@extends('layouts.app')

@section('content')

<div class="container">

  <div class="jumbotron p-4 p-md-5 text-white rounded mainContainer">
    <div class="col-md-12 px-0">
      <h1 class="display-4 font-italic">Vous souhaitez commander ? C'est par ici que ça se passe ...</h1>
      <p class="lead my-3">Ici vous trouverez tous nos produits, que vous pourrez sélectionner, rajouter au panier, vous pouvez voir les avis, en laisser.</p>
    </div>
  </div>


 




  <div class="row mb-2">
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