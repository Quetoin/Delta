
@extends('layouts.app')

@section('content')

<div class="container">

  <div class="jumbotron p-4 p-md-5 text-white rounded mainContainer">
    <div class="col-md-12 px-0">
      <h1 class="display-4 font-italic text-center">Historique de vos commandes</h1>
    </div>
  </div>

  <div class="row mb-2 d-flex flex-column justify-content-center">

      @foreach(Auth()->user()->orders as $order)
        <div id="card{{$order->id}}" class="col-8 card my-2 align-self-center cardOrders">
          
          <div class="card-header">
            Commande passée le {{Carbon\Carbon::parse($order->payment_created_at)->format("d/m/Y à H:i")}} d'un montant de <strong>{{getPrice($order->amount)}}</strong>
          </div>

          <div class="card-body">
            <h4 class="mb-4 text-center">Liste des produits</h4>

            
              @foreach(unserialize($order->products) as $product)
              <div class="liste-produits">
                <div class="mt-4">Nom du produit : {{$product[0]}}</div>
                <div class="mt-2">Prix : {{getPrice($product[1])}}</div>
                <div class="mt-2 mb-2">Quantité : {{$product[2]}}</div>
              </div>
              @endforeach
            

          </div>

        </div>
      @endforeach

  </div>
</div>


@endsection
