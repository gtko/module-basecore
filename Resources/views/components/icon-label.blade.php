@props([
    'label',
    'icon',
    'size' => '24'
])
<div class="flex justify-center items-center">
    @icon($icon, $size) <span class="ml-2">{{$label}}</span>
</div>
