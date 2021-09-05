@extends("basecore::errors.erreur")
@section('code', 503)
@section('title', "Oups. service non disponible!")
@section('message', "Le serveur ne répond plus.")

@section('image')
    <img alt="" class="h-48 lg:h-auto" src="{{ asset('dist/images/503.svg') }}">
@endsection
