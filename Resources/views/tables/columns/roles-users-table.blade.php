<div class="grid grid-cols-3 text-center gap-1" x-data="{open: false}">
    @foreach($getState() as $index => $tag)
        @if ($index < 5)
            <div class="bg-blue-500 py-1 px-2 rounded text-xs text-white font-medium whitespace-nowrap">
                {{$tag->label ?? $tag->name ?? ''}}
            </div>
        @else
            <div x-show="open"
                 class="bg-blue-500 py-1 px-2 rounded text-xs text-white font-medium whitespace-nowrap">
                {{$tag->label ?? $tag->name ?? ''}}
            </div>
        @endif

        @if($index == 5)
            <div x-show="!open" @click.stop="open = true" class="cursor-pointer flex justify-center  py-1 px-2  text-xs text-white rounded bg-green-600">
                Voir {{$getState()->count() - 5}} de plus ...
            </div>
        @elseif($index == $getState()->count() - 1 )
            <div x-show="open" @click.stop="open = false" class="cursor-pointer flex justify-center  py-1 px-2  text-xs text-white rounded bg-green-600">
                Voir moins ...
            </div>
        @endif

    @endforeach
</div>
