@props([
    'name',
    'label',
])

@if($label ?? null)
    @include('basecore::components.inputs.partials.label')
@endif

<textarea
    id="{{ str_replace('.', '_', $name) }}"
    name="{{ $name }}"
    rows="2"
    {{ ($required ?? false) ? 'required' : '' }}
    {{ $attributes->merge(['class' => 'form-control block appearance-none w-full py-1 px-2 text-base leading-normal text-gray-800 border border-gray-200 rounded']) }}
    autocomplete="off"
>{{$slot}}</textarea>

@error($name)
    @include('basecore::components.inputs.partials.error')
@enderror
