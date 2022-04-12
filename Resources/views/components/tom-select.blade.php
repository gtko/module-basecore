@props([
        'name' => '',
        'collection' => '',
        'label' => '',
        'id' => 'id',
        'max_item' => 3,
        'placeholder' => '',
        'create' => false,
        'multiple' => true,
        'selected' => [],
        'livewire' => true
])
@php
 $idUnique = uniqid('tom_select');
@endphp

<div wire:ignore {{$attributes}}>
    <select id="{{ $idUnique }}"
            @if($multiple)
                name="{{$name}}[]"
                multiple
            @else
                name="{{$name}}"
            @endif
            placeholder="{{ $placeholder }}"
            autocomplete="on"
            wire:model="{{ $name }}"
    >
        @foreach($collection as $i)
            <option value="{{ $i->$id }}"
            @if($livewire === false)
                @if(in_array($i->$id, $selected))
                    selected
                @endif
            @endif
            >
                {{ $i->$label }}
            </option>
        @endforeach
    </select>
    @push('scripts')
        <script>
            new TomSelect("#{{ $idUnique }}", {
                maxItems: {{ $max_item }},
                onItemAdd: function(value, text, selected) {
                    this.control_input.value = '';
                },
                @if($create)
                create: true,
                @endif
            });
        </script>
    @endpush
</div>
