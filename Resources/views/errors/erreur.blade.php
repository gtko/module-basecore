@extends('basecore::layout.main')
@section('head')
    <title>Error Page</title>
@endsection

@section('content')
    <div class="bg-white">
        <!-- BEGIN: Error Page -->
        <div class="error-page flex flex-col p-0 lg:flex-row items-start md:items-center justify-center h-screen text-center lg:text-left">
            <div class="-intro-x lg:mr-20">
                @yield('image')
            </div>
            <div class="text-black px-2 lg:px-0 mt-5 md:mt-10 lg:mt-0">
                <div class="intro-x text-8xl font-medium">@yield('code', "0")</div>
                <div class="intro-x text-xl lg:text-3xl font-medium mt-5">@yield('title', "")</div>
                <div class="intro-x text-lg text-gray-700 mt-3">@yield('message', "")</div>
                <a href="/" class="ignore-link intro-x btn py-3 px-4 text-black border-gray-700 dark:border-dark-5 dark:text-gray-300 mt-5 md:mt-10 ">
                    Retour accueil
                </a>
            </div>
        </div>
        <!-- END: Error Page -->
    </div>
@endsection
