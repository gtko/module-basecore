@props([
    'name',
    'label',
    'value',
])

<x-basecore::inputs.basic type="datetime-local" :name="$name" label="{{ $label ?? ''}}" :value="$value ?? ''" :attributes="$attributes"></x-basecore::inputs.basic>
