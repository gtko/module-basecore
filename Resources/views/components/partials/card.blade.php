@props([
    'bodyClasses' => '',
])

<div {{ $attributes->merge(['class' => 'box p-5']) }}>
    <div class="{{ $bodyClasses }}">

        @if(isset($title))
        <h4 class="text-lg font-bold mb-3">
            {{ $title }}
        </h4>
        @endif

        @if(isset($subtitle))
            <h5 class="text-gray-600 text-sm">
                {{ $subtitle }}
            </h5>
        @endif

        {{ $slot }}
    </div>
</div>
