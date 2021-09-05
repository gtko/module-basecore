@extends("basecore::errors.erreur")
@section('code', 500)
@section('title', "Oups. une erreur serveur c'est produite !")
@section('message', "un bug est survenu sur le serveur, contactez l'administrateur ou le développeur.")

@section('image')
    <img alt="" class="h-48 lg:h-auto" src="{{ asset('dist/images/500.svg') }}">
@endsection
