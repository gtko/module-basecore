<div class="intro-y box px-5 pt-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                <img alt="" class="rounded-full" src="{{$personne->avatar_url}}">
            </div>
            <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $personne->format_name }}</div>
                {{$details ?? ''}}
            </div>
        </div>
        <div
            class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">{{ $title ?? 'Personne Details'}}</div>
            <x-basecore::personne.address-details :personne="$personne"/>
        </div>

        {{$stats ?? ''}}

    </div>
    @if($slot)
        {{$slot}}
    @endif
</div>
