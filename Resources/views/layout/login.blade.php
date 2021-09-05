@extends('basecore::layout.base')

@section('body')
    <body class="login">
        {{ $slot }}
        <!-- BEGIN: JS Assets-->
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        @yield('script')
    </body>
@endsection
