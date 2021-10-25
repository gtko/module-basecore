@props([
        'name' => '',
        'collection' => '',
        'label' => '',
        'max_item' => 3,
        'placeholder' => '',
])

<div wire:ignore>
    <select id="select-state" name="state" multiple placeholder="{{ $placeholder }}" autocomplete="on" wire:model="{{ $name }}">
        @foreach($collection as $i)
            <option value="{{ $i->id }}"> {{ $i->$label }}</option>
        @endforeach
    </select>
    @push('scripts')
        <script>
            new TomSelect("#select-state", {
                maxItems: {{ $max_item }}
            });
        </script>
    @endpush
</div>
