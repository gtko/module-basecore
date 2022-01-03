@props([
    'id',
    'name',
    'label',
    'value',
    'checked' => false,
    'addHiddenValue' => true,
    'hiddenValue' => 0,
])

@php
    $checked = !! $checked
@endphp

<label class="relative block cursor-pointer" for="{{ $id ?? $name }}">

    {{-- Adds a hidden default value to be send if checked is false --}}
    @if($addHiddenValue)
    <input type="hidden" id="{{  $id ?? $name }}-hidden" name="{{ $name }}" value="{{ $hiddenValue }}">
    @endif

    <input
        type="checkbox"
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        value="{{ $value ?? 1 }}"
        {{ $checked ? 'checked' : '' }}
        {{ $attributes->merge(['class' => 'cursor-pointer']) }}
    >

    @if($label ?? null)
        <span class="text-gray-700 pl-2" >
            {{ $label }}
        </span>
    @endif
</label>

@error($name)
    @include('basecore::components.inputs.partials.error')
@enderror
