@extends('layouts.app')

@section('content')
<div class="container">
  

  <h3>{{$product->title}}</h3>

  <div class="description">
    {{$product->description}}
  </div>

  <div class="price">
    {{$product->getPrice()}}
  </div>

  <form action="{{route('cart.store')}}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">

    <button type="submit" class="btn btn-dark">Ajouter au panier</button>
  </form>

</div>
@endsection
