<x-basecore::app-layout>
    <x-slot name="breadcrumb">
        <x-basecore::breadcrumb-item>Permissions</x-basecore::breadcrumb-item>
    </x-slot>
    <x-basecore::layout.panel-full>
        <x-data-list :title="'Permissions'" :datas="$permissions" :type="new Modules\BaseCore\DataLists\PermissionDataList()"/>
    </x-basecore::layout.panel-full>
</x-basecore::app-layout>
