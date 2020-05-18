@extends('layouts.app')

@section('content')
<div class="container">
  @foreach ($products as $product)

  <h3>{{$product->title}}</h3>

  <div class="description">
    {{$product->description}}
  </div>

  <div class="price">
    {{$product->getPrice()}}
  </div>

  <p> <a href="{{route('products.show', $product->slug)}}"> Voir l'article</a></p>
      
  @endforeach
</div>
@endsection
