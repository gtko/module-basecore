<x-basecore::app-layout>
    <x-slot name="breadcrumb">
        <x-basecore::breadcrumb-item>Utilisateurs</x-basecore::breadcrumb-item>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.users.index_title')
        </h2>
    </x-slot>
    <livewire:datalistcrm::data-list :title="'Users'" :type="Modules\BaseCore\DataLists\UserDataList::class"/>
</x-basecore::app-layout>
