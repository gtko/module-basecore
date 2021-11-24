@props([
        'name' => '',
        'collection' => '',
        'label' => '',
        'max_item' => 3,
        'placeholder' => '',
])
@php
 $idUnique = uniqid('tom_select');
@endphp

<div wire:ignore {{$attributes}}>
    <select id="{{ $idUnique }}" name="state" multiple placeholder="{{ $placeholder }}" autocomplete="on" wire:model="{{ $name }}">
        @foreach($collection as $i)
            <option value="{{ $i->id }}"> {{ $i->$label }}</option>
        @endforeach
    </select>
    @push('scripts')
        <script>
            new TomSelect("#{{ $idUnique }}", {
                maxItems: {{ $max_item }}
            });
        </script>
    @endpush
</div>
