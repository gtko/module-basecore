@props([
    'name',
    'label',
    'type' => 'text',
])

@if($label ?? null)
    @include('basecore::components.inputs.partials.label')
@endif

<select
    id="{{ $name }}"
    name="{{ $name }}"
    {{ ($required ?? false) ? 'required' : '' }}
    {{ $attributes->merge(['class' => 'form-control block appearance-none w-full text-gray-800 border rounded dark:text-white']) }}
    autocomplete="off"
>{{ $slot }}</select>

@error($name)
    @include('basecore::components.inputs.partials.error')
@enderror
