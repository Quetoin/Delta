@extends('layouts.app')

@section('content')

<div class="container">

  <!--Section heading-->
  <h2 class="h1-responsive font-weight-bold text-center my-4">Contactes-nous</h2>
  <!--Section description-->
  <p class="text-center w-responsive mx-auto mb-5">T'as des questions ? N'hésites pas à nous contacter directement, on reviendra vers toi dès que possible :)</p>

  <div class="row">
      <!--Grid column-->
    <div class="col-md-7 mb-md-0 mb-5">
      <form action="{{route('contact')}}" method="POST">
        @csrf

        <div class="form-group">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ton nom ..." value="{{old('name')}}">
          @error('name')
            <div class="invalid-feedback">
              {{$errors->first("name")}}
            </div>
            @enderror
        </div>

        <div class="form-group">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ton email ..." value="{{old('email')}}">
          @error('email')
            <div class="invalid-feedback">
              {{$errors->first("email")}}
            </div>
            @enderror
        </div>

        <div class="form-group">
          <textarea name="message" cols="15" rows="8" class="form-control @error('name') is-invalid @enderror" placeholder="Ton message ..." value="{{old('message')}}"></textarea>
          @error('message')
            <div class="invalid-feedback">
              {{$errors->first("message")}}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Envoyer un message</button>

      </form>
    </div>


    <div class="col-md-5 text-center">
      <ul class="list-unstyled mb-0">
          <li><i class="fas fa-map-marker-alt fa-2x"></i>
              <p>Rue de la croix-blanche, 31700 Blagnac</p>
          </li>

          <li><i class="fas fa-phone mt-4 fa-2x"></i>
              <p><a href="tel:+33607625519">+33 6 07 62 55 19</a></p>
          </li>

          <li><i class="fas fa-envelope mt-4 fa-2x"></i>
              <p><a href="mailto:arthur.moulac2003@gmail.com">arthur.moulac2003@gmail.com</a></p>
          </li>
      </ul>
    </div>

  </div>

</div>
@endsection
