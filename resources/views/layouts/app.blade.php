<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('storage/images/settings/app_favicon.ico') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('js/plugins/dropzone/min/dropzone.min.css') }}"/>

    <link rel="stylesheet" id="css-main" href="{{ asset('css/dashmix.min.css') }}">
    <!-- Scripts -->
    @yield('css')
    @vite(['resources/sass/main.scss', 'resources/js/dashmix/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css">
    @livewireStyles
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
</head>
<body>
    <div id="app">
        <div id="page-container" class="sidebar-o sidebar-mini enable-page-overlay sidebar-dark side-scroll page-header-fixed">
            <!-- Side Overlay-->
            @livewire('template.main-aside')
            <!-- END Side Overlay -->
            <!-- Sidebar -->
            @livewire('template.main-nav')
            <!-- END Sidebar -->
            <!-- Header -->
            @livewire('template.main-header')
            <!-- END Header -->
            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->
            @livewire('template.main-footer')
            <!-- Footer -->
        </div>
    </div>
    @stack('modals')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    @livewireScripts
    <x:pharaonic-select2::scripts />
    <x-livewire-alert::scripts />
    @stack('scripts')
</body>
</html>
