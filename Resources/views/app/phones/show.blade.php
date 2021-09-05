<x-basecore::app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.phones.show_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-basecore::partials.card>
                <x-slot name="title">
                    <a href="{{ route('phones.index') }}" class="mr-4"
                        ><i class="mr-1 icon ion-md-arrow-back"></i
                    ></a>
                </x-slot>

                <div class="mt-4 px-4">
                    <div class="mb-4">
                        <h5 class="font-medium text-gray-700">
                            @lang('crud.phones.inputs.phone')
                        </h5>
                        <span>{{ $phone->phone ?? '-' }}</span>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="{{ route('phones.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('basecore::crud.common.back')
                    </a>

                    @can('create', Modules\BaseCore\Models\Phone::class)
                    <a href="{{ route('phones.create') }}" class="button">
                        <i class="mr-1 icon ion-md-add"></i>
                        @lang('basecore::crud.common.create')
                    </a>
                    @endcan
                </div>
            </x-basecore::partials.card>
        </div>
    </div>
</x-basecore::app-layout>
