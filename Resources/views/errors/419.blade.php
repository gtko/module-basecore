@extends("basecore::errors.erreur")
@section('code', 419)
@section('title', "Oups. erreur dans les data transmit!")
@section('message', "Une erreur de validation dans les datas envoyées.")

@section('image')
    <img alt="" class="h-48 lg:h-auto" src="{{ asset('dist/images/419.svg') }}">
@endsection
