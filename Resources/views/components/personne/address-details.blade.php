<div>
    <div class="flex flex-col justify-center items-center lg:items-start mt-4">
        <div class="truncate sm:whitespace-normal flex items-center mt-1">
            <i data-feather="mail" class="w-4 h-4 mr-2"></i>{{ $personne->email }}
        </div>
        <div class="truncate sm:whitespace-normal flex items-center mt-1">
            <i data-feather="phone" class="w-4 h-4 mr-2"></i> {{$personne->phone}}
        </div>
        <div class="truncate sm:whitespace-normal flex items-start mt-1">
            <i data-feather="home" class="w-4 h-4 mr-2"></i> {{$personne->fullAddress}}
        </div>
    </div>
</div>
