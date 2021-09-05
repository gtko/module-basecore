@extends("basecore::errors.erreur")
@section('code', 405)
@section('title', "Oups. la méthode n'existe pas !")
@section('message', "La resource n'est pas accessible avec la méthode demandé.")

@section('image')
    <img alt="" class="h-48 lg:h-auto" src="{{ asset('dist/images/405.svg') }}">
@endsection
