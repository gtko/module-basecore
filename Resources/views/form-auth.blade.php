@extends('basecore::layout.main')

@section('content')
        <livewire:basecore::form-auth-complete :user-id="\Illuminate\Support\Facades\Auth::id()" :class="'w-full h-full flex justify-center items-center mt-24'"/>

@endsection
