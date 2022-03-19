<x-basecore::app-layout>
    <x-slot name="breadcrumb">
        <x-basecore::breadcrumb-item :href="route('users.index')">Utilisateurs</x-basecore::breadcrumb-item>
        <x-basecore::breadcrumb-item >{{$user->format_name}}</x-basecore::breadcrumb-item>
        <x-basecore::breadcrumb-item>Editer</x-basecore::breadcrumb-item>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.users.edit_title')
        </h2>
    </x-slot>
    <x-basecore::layout.panel-left>
        <x-basecore::partials.card>
                <x-slot name="title">
                    <a href="{{ route('users.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <x-basecore::form
                    method="PUT"
                    action="{{ route('users.update', $user) }}"
                    class="mt-4"
                >
                    @include('basecore::app.users.form-inputs')

                    <div class="mt-5 flex justify-between items-center">
                        <a href="{{ route('users.index') }}" class="button">
                            <i
                                class="
                                    mr-1
                                    icon
                                    ion-md-return-left
                                    text-primary
                                "
                            ></i>
                            @lang('basecore::crud.common.back')
                        </a>


                        <x-basecore::button type="submit">
                            <i class="mr-1 icon ion-md-save"></i>
                            @lang('basecore::crud.common.update')
                        </x-basecore::button>
                    </div>
                </x-basecore::form>
            </x-basecore::partials.card>
    </x-basecore::layout.panel-left>
</x-basecore::app-layout>
