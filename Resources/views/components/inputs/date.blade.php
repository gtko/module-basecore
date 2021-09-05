@props([
    'name',
    'label',
    'value',
])

<x-basecore::inputs.basic type="date" :name="$name" label="{{ $label ?? ''}}" :value="$value ?? ''" :attributes="$attributes"></x-basecore::inputs.basic>
