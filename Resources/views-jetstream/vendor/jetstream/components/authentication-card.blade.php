<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <x-jet-application-mark/>

            <div class="my-auto">
                <img alt="Tinker Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/illustration.svg') }}">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    Quelques clics de plus <br> pour se connecter !
                </div>
                <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">
                    Connectez vous à votre CRM préfèré.
                </div>
            </div>
        </div>
        <!-- END: Login Info -->

        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    {{ $title ?? "Connection" }}
                </h2>
                <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">
                    Quelques clics de plus pour se connecter<br>
                    Connectez vous à votre CRM préfèré.
                </div>
                <div class="mt-2">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <!-- END: Login Form -->
    </div>
</div>
