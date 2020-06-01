
@extends('layouts.app')

@section('content')

<div class="container">

  <div class="jumbotron p-4 p-md-5 text-white rounded mainContainer">
    <div class="col-md-12 px-0">
      <h1 class="display-4 font-italic">Vos commandes</h1>
    </div>
  </div>

  <div class="row mb-2">

      @foreach(Auth()->user()->orders as $order)
        <div class="card">
          
          <div class="card-header">
            Commande passée le {{Carbon\Carbon::parse($order->payment_created_at)->format("d/m/Y à H:i")}} d'un montant de <strong>{{getPrice($order->amount)}}</strong>
          </div>

          <div class="card-body">
            <h6>Liste des produits</h6>
            @foreach(unserialize($order->products) as $product)
              <div>Nom du produit : {{$product[0]}}</div>
              <div>Prix : {{getPrice($product[1])}}</div>
              <div>Quantité : {{$product[2]}}</div>
            @endforeach
          </div>

        </div>
      @endforeach

  </div>
</div>


@endsection
