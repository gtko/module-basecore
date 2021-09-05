@props([
    'name',
    'label',
    'value',
])

<x-basecore::inputs.basic type="color" :name="$name" label="{{ $label ?? ''}}" :value="$value ?? ''" :attributes="$attributes"></x-basecore::inputs.basic>
