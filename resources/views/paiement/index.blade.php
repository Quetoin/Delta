
@extends('layouts.app')
 

@section("extra-script")
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')

<div class="container">

  <div class="col-md-12">
    <h1>Page de paiement</h1>
    <div class="row">
      <div class="col-md-12">

        <form id="payment-form" action="{{route('paiement.store')}}" method="post" class="my-4">
          @csrf
          <div id="card-element">
            <!-- Elements will create input elements here -->
          </div>
        
          <!-- We'll put the error messages in this element -->
          <div id="card-errors" role="alert"></div>
        
          <button class="btn btn-success my-3" id="submit">Procéder au paiement ({{getPrice(Cart::total())}})</button>
        </form>

      </div>
    </div>
  </div>

  

</div>


@endsection


@section("extra-js")

<script>
  var stripe = Stripe('pk_test_ePvn7go3LuNg78ao4etkdgeJ00uwFXSByd');
  var elements = stripe.elements();

  var style = {
    base: {
      color: "#32325d",
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: "antialiased",
      fontSize: "16px",
      "::placeholder": {
        color: "#aab7c4"
      }
    },
    invalid: {
      color: "#fa755a",
      iconColor: "#fa755a"
    }
  };

  var card = elements.create("card", { style: style });
  card.mount("#card-element");

  card.on('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
    if (error) {
      displayError.classList.add("alert","alert-warning");
      displayError.textContent = error.message;
    } else {
      displayError.classList.remove("alert","alert-warning");
      displayError.textContent = '';
    }
  });


  var form = document.getElementById('payment-form');

form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  submitButton = document.getElementById("submit");
  submitButton.disabled = true;

  stripe.confirmCardPayment("{{$clientSecret}}", {
    payment_method: {
      card: card
    }
  }).then(function(result) {
    if (result.error) {
      submitButton.disabled = false;
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        var paymentIntent = result.paymentIntent;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var url = form.action;
        var redirect = "merci";

        fetch(
          url,
          {
            headers: {
              "Content-type" : "application/json",
              "Accept" : "application/json, text-plain, */*",
              "X-Requested-With" : "XMLHttpRequest",
              "X-CSRF-TOKEN" : token
            },
            method:"POST",
            body: JSON.stringify({
              paymentIntent: paymentIntent
            })
          }).then((data) => {
          console.log(data)
          window.location.href= redirect;

        }).catch((error) => {
          console.log(error)
        })
        

      }
    }
  });
});

</script>
@endsection
