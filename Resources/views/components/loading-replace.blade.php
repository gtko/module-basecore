@props([
    'label' => '',
    'size' => 20,

])

<div {{$attributes}}>
    <span wire:loading class="flex justify-between items-centers">
            @icon('spinner', $size, 'animate-spin')
            @if(!empty($label))
                <span class="ml-2">{{$label}}</span>
            @endif
    </span>
    <span wire:loading.remove>
        {{ $slot }}
    </span>
</div>
