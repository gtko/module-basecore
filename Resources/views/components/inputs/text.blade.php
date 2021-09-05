@props([
    'name',
    'label',
    'value',
])

<x-basecore::inputs.basic type="text" :name="$name" label="{{ $label ?? ''}}" :value="$value ?? ''" :attributes="$attributes"/>
