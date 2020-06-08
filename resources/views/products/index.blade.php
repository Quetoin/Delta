
@extends('layouts.app')

@section('content')

<div class="container">


  <div class="nav-scroller py-1 my-2">
    <nav class="nav d-flex justify-content-center">
      @foreach (App\Category::all() as $category)
          <a class="p-2 text-muted" href="{{ route('boutique', ['categorie' => $category->slug]) }}">{{ $category->name }}</a>
      @endforeach
    </nav>
  </div>




  <div class="row mb-2">
    @foreach ($products as $product)
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">
            @foreach($product->categories as $category)
              {{$category->name}}

            @endforeach
          </strong>



            <h3 class="mb-0">{{$product->title}}</h3>
            <div class="mb-1 text-muted">{{$product->getPrice()}}</div>
            <p class="card-text mb-auto">{!!$product->description!!}</p>
            <a href="{{route('products.show', $product->slug)}}" class="stretched-link">Voir l'article</a>
          
        </div>


        <?php
          //
        ?>

        <div class="col-auto d-none d-lg-block">
          <p>
<?php
           
        
           

            ?>
            <img src="{{ Voyager::image($product->image)}}">
        
          {{--
            
            $file = json_decode(($product->image)[0]->download_link);
            
      
             {{ Voyager::image($file) }}
            
            
            <img src="{{ asset('storage/'.json_decode($product->image)[0])}}">
          echo Voyager::image($product->image);
              $file = (json_decode($product->image))[0]->download_link;
              <img src="{{Voyager::image($product->image)}}">
              $file = asset((json_decode($product->image)));
              
          
          --}}
        </div>
      </div>
    </div>
    @endforeach
    {{$products->appends(request()->input())->links()}}

  </div>
</div>


@endsection
