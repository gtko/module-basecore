@props([
    'name',
    'value',
])

<x-basecore::inputs.basic type="hidden" :name="$name" :value="$value ?? ''" :attributes="$attributes"></x-basecore::inputs.basic>
