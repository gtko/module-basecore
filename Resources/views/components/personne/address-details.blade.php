<div>
    <div class="flex flex-col justify-center items-center lg:items-start mt-4">
{{--        ajout de la societe pour yoram crm sur la fiche client--}}
        @if($personne->company ?? false)
            <div class="truncate sm:whitespace-normal flex items-center mt-1">
                @icon('briefcase', null, 'mr-2') {{ $personne->company ?? ''}}
            </div>
        @endif
        <div class="truncate sm:whitespace-normal flex items-center mt-1">
            @icon('email', null, 'mr-2') {{ $personne->email }}
        </div>
        <div class="truncate sm:whitespace-normal flex items-center mt-1">
            @icon('phone', null, 'mr-2') {{$personne->phone}}
        </div>
        <div class="truncate sm:whitespace-normal flex items-start mt-1">
            @icon('home', null, 'mr-2') {{$personne->fullAddress}}
        </div>
    </div>
</div>
