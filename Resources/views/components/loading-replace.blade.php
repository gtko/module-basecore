@props([
    'label' => '',
    'size' => 20,

])

<div>
    <div wire:loading  {{$attributes}}>
        <span class="flex justify-between items-center">
            @icon('spinner', $size, 'animate-spin')
            @if(!empty($label))
                <span class="ml-2">{{$label}}</span>
            @endif
        </span>
    </div>
    <span wire:loading.remove>
        {{ $slot }}
    </span>
</div>
