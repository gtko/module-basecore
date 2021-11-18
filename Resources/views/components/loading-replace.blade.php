@props([
    'label' => '',
    'size' => 20,
    'loader' => null

])

<div>
    <div wire:loading  {{$attributes}}>
        @if($loader)
            {{ $loader }}
        @else
            <span class="flex justify-between items-center">
                @icon('spinner', $size, 'animate-spin')
                    @if(!empty($label))
                        <span class="ml-2">{{$label}}</span>
                    @endif
            </span>
        @endif
    </div>
    <span wire:loading.remove  {{$attributes}}>
        {{ $slot }}
    </span>
</div>
