@extends("basecore::errors.erreur")
@section('code', 401)
@section('title', "Oups. vous n'avais pas l'autorisation !")
@section('message', "Vous n'avais pas l'autorisation pour faire cette action.")

@section('image')
    <img alt="" class="h-48 lg:h-auto" src="{{ asset('dist/images/401.svg') }}">
@endsection
