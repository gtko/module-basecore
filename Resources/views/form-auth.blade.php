@extends('basecore::layout.main')

@section('content')
    <livewire:basecore::modal-auth-complete :user-id="\Illuminate\Support\Facades\Auth::id()"/>
@endsection
