<x-basecore::app-layout>
    <x-slot name="breadcrumb">
        <x-basecore::breadcrumb-item :href="route('users.index')">Utilisateurs</x-basecore::breadcrumb-item>
        <x-basecore::breadcrumb-item>{{$user->format_name}}</x-basecore::breadcrumb-item>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.users.show_title')
        </h2>
    </x-slot>
    <x-basecore::layout.panel-full>
        <x-basecore::personne.header :personne="$user">
            <x-slot name="title">Utilisateur détails</x-slot>
            <x-slot name="details">
                <x-basecore::role.badges :roles="$user->roles"/>
            </x-slot>

            @if($user->hasRole(['commercial']))
            <x-slot name="stats">
                {{$stats ?? ''}}
            </x-slot>
            @endif

            Ma nav

        </x-basecore::personne.header>


        test content

    </x-basecore::layout.panel-full>
</x-basecore::app-layout>
