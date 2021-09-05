<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="title">
            Mot de passe perdu
        </x-slot>

        <div class="my-4 text-sm text-gray-600">
            <strong>Vous avez oublié votre mot de passe ?</strong> Aucun problème. Indiquez-nous simplement votre adresse électronique et nous vous enverrons un
            lien de réinitialisation du mot de passe qui vous permettra d'en choisir un nouveau.
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-input id="email" placeholder="{{ __('Email') }}" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="xl:w-64 xl:mr-3">
                    Envoyer le lien de réinitialisation
                </x-jet-button>
            </div>
        </form>



    </x-jet-authentication-card>
</x-guest-layout>
