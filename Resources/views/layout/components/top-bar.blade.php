<!-- BEGIN: Top Bar -->
<div id="wrapperHeader" class="hidden md:flex top-bar -mx-4 px-4 md:mx-0 md:px-0">

    <!-- BEGIN: Breadcrumb -->
    <x-basecore::breadcrumb>
       {{ $breadcrumb ?? ''}}
    </x-basecore::breadcrumb>
    <!-- END: Breadcrumb -->


    <x-basecore::resolve-type-view
        :contrat-view-class="Modules\BaseCore\Contracts\Views\TopBarContract::class"
        :arguments="[]"
    />

    <!-- BEGIN: Account Menu -->
    <div class="">
        <x-jet-dropdown align="right" width="48" contentClasses="dropdown-menu__content box dark:bg-dark-6">
        <x-slot name="trigger">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" />
                </button>
            @else
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        {{ Auth::user()->name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            @endif
        </x-slot>

        <x-slot name="content">

                <div class="p-4 border-b border-gray-200 border-opacity-5 dark:border-dark-3">
                    <div class="font-medium">{{\Illuminate\Support\Facades\Auth::user()->format_name}}</div>
                    <div class="text-xs text-gray-600 mt-0.5 dark:text-gray-600">{{ __('Gérer votre profil') }}</div>
                </div>

                <div class="p-2">
                    <a href="{{ route('profile.show') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-gray-200 dark:hover:bg-dark-3 rounded-md">
                        @icon('user', 20, 'mr-2') {{ __('Profil') }}
                    </a>
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <a href="{{ route('api-tokens.index') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-gray-200 dark:hover:bg-dark-3 rounded-md">
                            @icon('fingerprint', 20, 'mr-2')  {{ __('Token API') }}
                        </a>
                    @endif
                    <span  class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-gray-200 dark:hover:bg-dark-3 rounded-md">
                        @icon('moon', 20, 'mr-2') @include('basecore::layout.components.dark-mode-switcher')
                    </span>

                    @if (session()->has('impersonate'))
                        <a  href='{{route('users.depersonate')}}' class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-gray-200 dark:hover:bg-dark-3 rounded-md">
                            @icon('portalout', 20, 'mr-2') revenir à mon profil
                        </a>
                    @endif

                </div>

                <div class="p-2 border-t border-gray-200 cursor-pointer border-opacity-5 dark:border-dark-3">
                    <form method="POST" action="{{ route('logout') }}" onclick="this.submit();" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-gray-200 dark:hover:bg-dark-3 rounded-md">
                        @csrf
                        @icon('logout', 20, 'mr-2') {{ __('Déconnexion') }}
                    </form>
                </div>
        </x-slot>
    </x-jet-dropdown>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
