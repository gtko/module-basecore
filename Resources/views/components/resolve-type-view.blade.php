@forelse($typeViews as $typeView)
    @if(!$typeView->isEmpty())
        @if($typeView->hasBladeComponentType())
            <x-dynamic-component :component="$typeView->getContent()"
                                 :attributes="new Illuminate\View\ComponentAttributeBag($arguments)"
            />
        @elseif($typeView->hasBladeViewType())
            @include($typeView->getContent(), $arguments)
        @elseif($typeView->hasLivewireType())
            @livewire($typeView->getContent(), $arguments)
        @elseif($typeView->hasHtmlType())
            {!! $typeView->getContent() !!}
        @endif
    @endif
@empty
    {{ $slot ?? '' }}
@endforelse
