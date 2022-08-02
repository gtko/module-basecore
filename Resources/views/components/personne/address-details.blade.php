<div>
    <div class="flex flex-col justify-center items-center lg:items-start mt-4">
{{--        ajout de la societe pour yoram crm sur la fiche client--}}
        @if($personne->company ?? false)
            <div class="truncate sm:whitespace-normal flex items-center mt-1">
                @icon('briefcase', null, 'mr-2') {{ $personne->company ?? 'NC'}}
            </div>
        @endif
        <div class="truncate sm:whitespace-normal flex items-center mt-1">
            @icon('email', null, 'mr-2') {{ $personne->email ?? "N/C"}}
        </div>
        <div class="truncate sm:whitespace-normal flex items-center mt-1">
            @icon('phone', null, 'mr-2') {{$personne->phone ?? "N/C"}}
        </div>

        <div class="truncate sm:whitespace-normal flex items-start mt-1">
            @icon('home', null, 'mr-2') {{$personne->fullAddress ?? 'N/C'}}
        </div>
    </div>
</div>
