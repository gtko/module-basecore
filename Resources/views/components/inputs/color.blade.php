@props([
    'name',
    'label',
    'value',
])
@if($label ?? null)
    @include('basecore::components.inputs.partials.label')
@endif

<input
    type="color"
    id="{{ $name }}"
    name="{{ $name }}"
    {{ $attributes->merge(['class' => '']) }}
    value="{{ old($name, $value ?? '') }}"
    {{ ($required ?? false) ? 'required' : '' }}
    autocomplete="off"
/>

@error($name)
@include('basecore::components.inputs.partials.error')
@enderror
