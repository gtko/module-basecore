@extends("basecore::errors.erreur")

@section('code', 404)
@section('title', "Oups. Cette page n'existe pas !")
@section('message', "Vous avez peut-être fait une erreur de frappe dans l'adresse ou la page a pu être déplacée.")

@section('image')
    <img alt="" class="h-48 lg:h-auto" src="{{ asset('dist/images/404.svg') }}">
@endsection
