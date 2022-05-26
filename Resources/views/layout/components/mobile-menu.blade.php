<!-- BEGIN: Mobile Menu -->
<div id='mobile-menu' x-data="{open:false}" class="relative mobile-menu @yield('mobile-menu-modifier') {{ $layout == 'top-menu' ? 'mobile-menu--light' : '' }} md:hidden">
    <div class="mobile-menu-bar">

        <x-basecore::resolve-type-view
            :contrat-view-class="Modules\BaseCore\Contracts\Views\BeforeMobileMenuContract::class"
            :arguments="[]"
        />


        <div class="flex justify-end items-center">
            <x-basecore::resolve-type-view
                :contrat-view-class="Modules\BaseCore\Contracts\Views\MobileMenuBarContract::class"
                :arguments="[]"
            />
            <a href="javascript:;" x-on:click="open=!open" id="mobile-menu-toggler" class="ml-4">
                @icon('burger',24, "w-8 h-8 text-gray-600 dark:text-white")
            </a>
        </div>
    </div>
    <ul class="mobile-menu-box py-5 hidden" x-bind:class="{'hidden':!open}" x-cloak>

        @foreach ($side_menu as $menuKey => $menu)
            @if ($menu == 'devider')
                <li class="menu__devider my-6"></li>
            @else
                <li @if(isset($menu['sub_menu'])) x-data="{open_submenu : {{($first_level_active_index == $menuKey)?'true':'false'}}}" @endif>
                    @if(isset($menu['sub_menu']))
                    <a href='javascript:;' x-on:click="open_submenu=!open_submenu"
                       class="{{ $first_level_active_index == $menuKey ? 'menu menu--active' : 'menu' }}"
                    >
                    @else
                        <a x-on:click="open=false"
                           href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params'] ?? []) : 'javascript:;' }}"
                           class="{{ $first_level_active_index == $menuKey ? 'menu menu--active' : 'menu' }}"
                        >
                    @endif
                        <div class="menu__icon">
                            @icon($menu['icon'])
                        </div>
                        <div class="menu__title">
                            {{ $menu['title'] }}
                            @if (isset($menu['sub_menu']))
                                <div class="menu__sub-icon"  x-bind:class="{'transform rotate-180' : open_submenu }">
                                    @icon('chevron-down')
                                </div>
                            @endif
                        </div>
                    </a>
                    @if (isset($menu['sub_menu']))
                        <ul x-cloak x-bind:class="{'menu__sub-open' : open_submenu }">
                            @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                <li @if(isset($menu['sub_menu'])) x-data="{open_submenu : {{($second_level_active_index == $subMenuKey)?'true':'false'}}}" @endif>
                                    <a x-on:click="open=false" href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name'], $subMenu['params'] ?? []) : 'javascript:;' }}" class="{{ $second_level_active_index == $subMenuKey ? 'menu menu--active' : 'menu' }}">
                                        <div class="menu__icon">
                                            @icon($menu['icon'])
                                        </div>
                                        <div class="menu__title">
                                            {{ $subMenu['title'] }}
                                            @if (isset($subMenu['sub_menu']))
                                                <div class="menu__sub-icon {{ $second_level_active_index == $subMenuKey ? 'transform rotate-180' : '' }}">
                                                    @icon('chevron-down')
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                    @if (isset($subMenu['sub_menu']))
                                        <ul x-cloak x-bind:class="{'menu__sub-open' : open_submenu }">
                                            @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                <li>
                                                    <a x-on:click="open=false" href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], $lastSubMenu['params']) : 'javascript:;' }}" class="{{ $third_level_active_index == $lastSubMenuKey ? 'menu menu--active' : 'menu' }}">
                                                        <div class="menu__icon">
                                                            @icon($subMenu['icon'])
                                                        </div>
                                                        <div class="menu__title">{{ $lastSubMenu['title'] }}</div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
        <li class="menu__devider my-6"></li>
        <!-- Account Management -->
        <div class="flex justify-between items-center px-4 py-2 text-base text-gray-600">
            <div>{{ __('Gérer le compte') }}</div>
            <div>
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
            </div>
        </div>

        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
        <a x-on:click="open=false" href="{{ route('api-tokens.index') }}" class="menu">
            <div class="menu__icon">
                @icon('fingerprint')
            </div>

            <div class="menu__title">
                <a href="">
                    {{ __('API Tokens') }}
                </a>
            </div>

        </a>
        @endif

        <a x-on:click="open=false" href="{{ route('profile.show') }}" class="menu">
            <div class="menu__icon">
                @icon('user')
            </div>
            <div class="menu__title">
                {{ __('Profile') }}
            </div>
        </a>

        <div class="menu">
            <div class="menu__icon">
                @icon('moon')
            </div>
            <div class="menu__title">
                @include('basecore::layout.components.dark-mode-switcher')
            </div>
        </div>

        <!-- Authentication -->
        <div class="menu">
            <div class="menu__icon">
                @icon('logout')
            </div>
            <div class="menu__title">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class='ignore-link' href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                        {{ __('Déconnexion') }}
                    </a>
                </form>
            </div>
        </div>
    </ul>
</div>
<!-- END: Mobile Menu -->
