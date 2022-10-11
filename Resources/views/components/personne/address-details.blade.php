<div>
    <div class="flex flex-col items-center justify-center mt-4 lg:items-start">
{{--        ajout de la societe pour yoram crm sur la fiche client--}}
        @if($personne->company ?? false)
            <div class="flex items-center mt-1 truncate sm:whitespace-normal">
                @icon('briefcase', null, 'mr-2') {{ $personne->company ?? 'NC'}}
            </div>
        @endif
        
        @forelse ($personne->personne->emails as $email)
            <div class="flex items-center mt-1 truncate sm:whitespace-normal">
                @icon('email', null, 'mr-2') {{ $email->email ?? "N/C"}}
            </div>
        @empty
            <div class="flex items-center mt-1 truncate sm:whitespace-normal">
                @icon('email', null, 'mr-2') {{ $personne->email ?? "N/C"}}
            </div>
        @endforelse
        
        @forelse ($personne->personne->phones as $phone)
            <div class="flex items-center mt-1 truncate sm:whitespace-normal">
                @icon('phone', null, 'mr-2') {{ $phone->phone ?? "N/C"}}
            </div>
        @empty
            <div class="flex items-center mt-1 truncate sm:whitespace-normal">
                @icon('phone', null, 'mr-2') {{$personne->phone ?? "N/C"}}
            </div>
        @endforelse

        <div class="flex items-start mt-1 truncate sm:whitespace-normal">
            @icon('home', null, 'mr-2') {{$personne->fullAddress ?? 'N/C'}}
        </div>
    </div>
</div>
