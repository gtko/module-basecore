@extends("basecore::errors.erreur")
@section('code', 400)
@section('title', "Oups. mauvaise requête !")
@section('message', "Le serveur ne comprend pas la requête que vous avez effectué.")

@section('image')
    <img alt="" class="h-48 lg:h-auto" src="{{ asset('dist/images/400.svg') }}">
@endsection
