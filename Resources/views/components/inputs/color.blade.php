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
    value="{{ old($name, $value ?? '') }}"
    {{ ($required ?? false) ? 'required' : '' }}
    {{ $attributes->merge(['class' => '']) }}
    autocomplete="off"
/>

@error($name)
@include('basecore::components.inputs.partials.error')
@enderror
