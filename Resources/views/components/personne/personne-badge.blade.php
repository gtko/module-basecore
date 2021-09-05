@props([
    'personne'
])

<div class="flex justify-start items-center">
    <x-basecore::avatar :url="$personne?->avatar_url"/> <div class="ml-2">{{$personne?->format_name}}</div>
</div>
