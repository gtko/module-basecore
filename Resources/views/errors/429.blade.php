@extends("basecore::errors.erreur")
@section('code', 429)
@section('title', "Oups. trop de requêtes !")
@section('message', "Vous avez effectué trop de requête vers le serveur.")

@section('image')
    <img alt="" class="h-48 lg:h-auto" src="{{ asset('dist/images/429.svg') }}">
@endsection
