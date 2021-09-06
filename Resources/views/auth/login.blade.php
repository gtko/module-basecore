<x-basecore::guest-layout>
    <x-jet-authentication-card>
        <x-slot name="title">
            {{__('basecore::common.title_login')}}
        </x-slot>


        <x-jet-validation-errors class="my-4" />

        <x-basecore::resolve-type-view
            :contrat-view-class="Modules\BaseCore\Contracts\Views\BeforeLoginContract::class"
            :arguments="[]"
        />

        <form id="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="intro-x mt-8">
                <x-jet-input id="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 block"
                             type="email" name="email" placeholder="Email"
                             :value="old('email')" required autofocus
                />
                <x-jet-input id="password" class="intro-x login__input
                            form-control py-3 px-4 border-gray-300 block mt-4"
                             placeholder="Mot de passe"
                             type="password"
                             name="password" required autocomplete="current-password"
                />


            </div>

            <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                <label for="remember_me" class="flex items-center mr-auto">
                    <x-jet-checkbox id="remember_me" name="remember" class="form-check-input border mr-2"/>
                    <span class="cursor-pointer select-none">{{__('basecore::common.remember_me')}}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{__('basecore::common.forgot_password')}}
                    </a>
                @endif
            </div>
            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left flex justify-between">
                <x-jet-button class="xl:w-32 xl:mr-3">
                    {{__('basecore::common.login')}}
                </x-jet-button>

                @if(app(Modules\BaseCore\Contracts\Services\FeaturesContract::class)->available('register'))
                    <a href='{{route('register')}}'
                       class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top"
                    >
                        {{__('basecore::common.register')}}
                    </a>
                @endif

            </div>
        </form>

        <x-basecore::resolve-type-view
            :contrat-view-class="Modules\BaseCore\Contracts\Views\AfterLoginContract::class"
            :arguments="[]"
        />

    </x-jet-authentication-card>
</x-basecore::guest-layout>
