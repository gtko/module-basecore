@extends("basecore::errors.erreur")
@section('code', 504)
@section('title', "Oups. attente dépassé!")
@section('message', "Le serveur à coupé l'execution de la demande car trop longue.")

@section('image')
    <img alt="" class="h-48 lg:h-auto" src="{{ asset('dist/images/504.svg') }}">
@endsection
