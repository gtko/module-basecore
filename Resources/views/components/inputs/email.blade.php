@props([
    'name',
    'label',
    'value',
])

<x-basecore::inputs.basic type="email" :name="$name" label="{{ $label ?? ''}}" :value="$value ?? ''" :attributes="$attributes"></x-basecore::inputs.basic>
