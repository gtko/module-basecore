<x-basecore::app-layout>
    <x-slot name="breadcrumb">
        <x-basecore::breadcrumb-item>{{$title}}</x-basecore::breadcrumb-item>
    </x-slot>
    <livewire:datalistcrm::data-list :title="$title" :type="$datalist"/>
</x-basecore::app-layout>
