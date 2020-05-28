@extends('layouts.app')

@section('content')

@if(Cart::count() > 0)

  <div class="px-4 px-lg-0">

    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

            <!-- Shopping cart table -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Produits</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Prix</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Quantité</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Supprimer</div>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  @foreach (Cart::content() as $product)

                  <tr>
                    <th scope="row" class="border-0">
                      <div class="p-2">
                        <img src="">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"><a href="#">{{$product->model->title}}</h5>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle">{{$product->model->getPrice()}}</td>
                    <td class="border-0 align-middle">1</td>
                    <td class="border-0 align-middle">
                      
                      <form action="{{route('cart.destroy', $product->rowId)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="fa fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>

                  @endforeach
                </tbody>

              </table>
            </div>
            <!-- End -->
          </div>
        </div>

        <div class="row py-5 p-4 bg-white rounded shadow-sm">
          <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Bon de réduction</div>
            <div class="p-4">
              <p class="font-italic mb-4">Si vous avez un bon de réduction, merci de le noter ici</p>
              <div class="input-group mb-4 border rounded-pill p-2">
                <input type="text" placeholder="Valider le coupon" aria-describedby="button-addon3" class="form-control border-0">
                <div class="input-group-append border-0">
                  <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Valider</button>
                </div>
              </div>
            </div>
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Commentaires</div>
            <div class="p-4">
              <p class="font-italic mb-4">Si vous souhaitez nous donner des instructions pour la livraison, c'est ici que ça se passe !</p>
              <textarea name="" cols="30" rows="2" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détail de la commande</div>
            <div class="p-4">
              <ul class="list-unstyled mb-4">
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong>{{getPrice(Cart::subtotal())}}</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong>{{getPrice(Cart::tax())}}</strong></li>
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                  <h5 class="font-weight-bold">{{getPrice(Cart::total())}}</h5>
                </li>
              </ul><a href="{{route('paiement.index')}}" class="btn btn-dark rounded-pill py-2 btn-block">Passer au paiement</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@else
  <div class="jumbotron p-4 p-md-5 text-white rounded mainContainer">
    <div class="col-md-12 px-0">
      <p class="lead my-3 text-center">Votre panier est vide</p>
    </div>
  </div>
@endif
@endsection
