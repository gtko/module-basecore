@extends('basecore::layout.main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('basecore::layout.components.mobile-menu')
    <div class="flex overflow-hidden">
        <!-- BEGIN: Side Menu -->
        <nav id="main-menu-navigation" class="side-nav lg:flex flex-col justify-start items-start">

            <x-basecore::resolve-type-view
                :contrat-view-class="Modules\BaseCore\Contracts\Views\BeforeMenuContract::class"
                :arguments="[]"
            />

            <div class="side-nav__devider my-6 w-full">
            </div>
            <ul class="flex-grow w-full">
                <x-basecore::resolve-type-view
                    :contrat-view-class="Modules\BaseCore\Contracts\Views\BeforeInMenuContract::class"
                    :arguments="[]"
                />
                @foreach ($side_menu as $menuKey => $menu)
                    @if ($menu == 'devider')
                        <li class="side-nav__devider my-6"></li>
                    @else
                        <li class="@if(isset($menu['route_sup'])) flex items-center justify-between @endif">
                            <span
                                class="w-full flex items-center justify-between {{ $first_level_active_index == $menuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <a href="{{ isset($menu['route_name']) ? route($menu['route_name'], $menu['params'] ?? []) : 'javascript:;' }}"
                                   class="flex justify-start items-center w-full">
                                    <div class="side-menu__icon">
                                            @icon($menu['icon'])
                                    </div>
                                    <div class="side-menu__title flex items-center justify-between">
                                        {{ $menu['title'] }}
                                        @if (isset($menu['sub_menu']))
                                            <div
                                                class="side-menu__sub-icon">
                                                   @icon('chevron-down')
                                            </div>
                                        @endif
                                    </div>
                                </a>

                                @if(isset($menu['icon_sup']))
                                    <a class="pr-4 zoom-in"
                                       href="@if(isset($menu['route_sup'])) {{route($menu['route_sup'])}} @endif">
                                        @icon($menu['icon_sup'])
                                    </a>
                                @endif

                                @if(($menu['count'] ?? false))
                                    @if($menu['link_count'] ?? false)
                                        <a href="{{$menu['link_count']}}"
                                           class="px-2.5 py-0.5 cursor-pointer rounded-full text-xs font-medium bg-green-100 text-green-800 mr-2">
                                            {{$menu['count']}}
                                        </a>
                                    @else
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mr-2">
                                        {{$menu['count']}}
                                    </span>
                                    @endif
                                @endif

                            </span>
                            @if (isset($menu['sub_menu']))
                                <ul class="{{ $first_level_active_index == $menuKey ? 'side-menu__sub-open' : '' }}">
                                    @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                        <li>
                                            <a href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name'], $subMenu['params'] ?? []) : 'javascript:;' }}"
                                               class="{{ $second_level_active_index == $subMenuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                                <div class="side-menu__icon">
                                                    @icon($subMenu['icon'])
                                                </div>
                                                <div class="side-menu__title">
                                                    {{ $subMenu['title'] }}
                                                    @if (isset($subMenu['sub_menu']))
                                                        <div
                                                            class="side-menu__sub-icon {{ $second_level_active_index == $subMenuKey ? 'transform rotate-180' : '' }}">
                                                            @icon('chevron-down')
                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                            @if (isset($subMenu['sub_menu']))
                                                <ul class="{{ $second_level_active_index == $subMenuKey ? 'side-menu__sub-open' : '' }}">
                                                    @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                        <li>
                                                            <a href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], $lastSubMenu['params'] ?? []) : 'javascript:;' }}"
                                                               class="{{ $third_level_active_index == $lastSubMenuKey ? 'side-menu side-menu--active' : 'side-menu' }}">
                                                                <div class="side-menu__icon">
                                                                    @icon($subMenu['icon'])
                                                                </div>
                                                                <div
                                                                    class="side-menu__title">{{ $lastSubMenu['title'] }}</div>
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
                <x-basecore::resolve-type-view
                    :contrat-view-class="Modules\BaseCore\Contracts\Views\AfterInMenuContract::class"
                    :arguments="[]"
                />
            </ul>

            <x-basecore::resolve-type-view
                :contrat-view-class="Modules\BaseCore\Contracts\Views\AfterMenuContract::class"
                :arguments="[]"
            />
        </nav>

        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content @yield('content-modifier')">
            @include('basecore::layout.components.top-bar')
            <div id="wrapperContent">
                {{$slot}}
            </div>
        </div>
    </div>
@endsection
