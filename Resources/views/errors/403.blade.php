@extends("basecore::errors.erreur")
@section('code', 403)
@section('title', "Oups. le serveur bloque l'accès !")
@section('message', "Le serveur n'autorise pas l'accès à cette ressource.")

@section('image')
    <img alt="" class="h-48 lg:h-auto" src="{{ asset('dist/images/403.svg') }}">
@endsection
