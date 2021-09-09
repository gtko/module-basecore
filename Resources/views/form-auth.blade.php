@extends('basecore::layout.main')

@section('content')
    <livewire:basecore::form-auth-complete :user-id="\Illuminate\Support\Facades\Auth::id()"/>
@endsection
