<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('frontend/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('frontend/css/shared/iconly.css') }}">

    {{-- Date Picker --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap-datepicker.css') }}">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker.js') }}"></script>

    {{-- Sweetalert --}}
    <link rel="stylesheet" href="{{ asset('frontend/extensions/sweetalert2/sweetalert2.min.css') }}">

    {{-- Choices --}}
    <link rel="stylesheet" href="{{ asset('frontend/extensions/choices.js/public/assets/styles/choices.min.css') }}">

    @stack('css-internal')
</head>

<body>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            {{ $slot }}

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; School Management System</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="https://instagram.com/ibnnu.as">Ibnnu</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/app.js') }}"></script>
    <script src="{{ asset('frontend/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('frontend/extensions/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('frontend/js/pages/form-element-select.js') }}"></script>
    @stack('js-internal')
</body>
</html>
