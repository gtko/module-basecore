@props([
    'method' => 'POST',
    'action'
])

<x-basecore::form method="{{ $method }}" action="{{ $action }}">
    <div>
        <button type="submit" {{ $attributes }}>
            {{ $slot }}
        </button>
    </div>
</x-basecore::form>
