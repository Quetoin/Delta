@component('mail::message')
# Bonjour

Vous avez reçu un mail de la part de {{$data['name']}} :

{{$data['message']}}
