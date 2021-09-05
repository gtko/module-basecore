@props([
    'href' => null
])
<div class="flex justify-start items-center">
    @icon('chevron-right', null, 'breadcrumb__icon')
    <a @if($href) href='{{$href}}' class="breadcrumb" @else class="breadcrumb--active" @endif>
        {{ $slot ?? null}}
    </a>
</div>
