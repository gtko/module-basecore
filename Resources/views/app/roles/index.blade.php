<x-basecore::app-layout>
    <x-slot name="breadcrumb">
        <x-basecore::breadcrumb-item>Rôles</x-basecore::breadcrumb-item>
    </x-slot>
    <x-basecore::layout.panel-full>
        <livewire:datalistcrm::data-list :title="'Rôles'" :type="Modules\BaseCore\DataLists\RoleDataList::class"/>
    </x-basecore::layout.panel-full>
</x-basecore::app-layout>
