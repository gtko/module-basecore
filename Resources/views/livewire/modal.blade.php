<div>
    @if($isOpen)
    <x-jet-modal wire:model="isOpen" max-width="lg">
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
    </x-jet-modal>
    @endif
</div>
