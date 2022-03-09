@forelse($typeViews as $typeView)
    @if(!$typeView->isEmpty())
        @if($typeView->hasBladeComponentType())
            <x-dynamic-component :component="$typeView->getContent()"
                                 :attributes="new Illuminate\View\ComponentAttributeBag(array_merge($typeView->getArguments(), $arguments))"
            />
        @elseif($typeView->hasBladeViewType())
            @include($typeView->getContent(), array_merge($typeView->getArguments(), $arguments))
        @elseif($typeView->hasLivewireType())
            @livewire($typeView->getContent(), array_merge($typeView->getArguments(), $arguments) )
        @elseif($typeView->hasHtmlType())
            {!! $typeView->getContent() !!}
        @endif
    @endif
@empty
    {{ $slot ?? '' }}
@endforelse
