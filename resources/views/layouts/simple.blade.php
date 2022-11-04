<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>Dashmix - Bootstrap 5 Admin Template &amp; UI Framework</title>

  <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="noindex, nofollow">

  <!-- Icons -->
  <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
  <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

  <!-- Modules -->
  @yield('css')
  @vite(['resources/sass/main.scss', 'resources/js/dashmix/app.js'])
  @livewireStyles
  <!-- Alternatively, you can also include a specific color theme after the main stylesheet to alter the default color theme of the template -->
  {{-- @vite(['resources/sass/main.scss', 'resources/sass/dashmix/themes/xwork.scss', 'resources/js/dashmix/app.js']) --}}
  @yield('js')
</head>

<body>

  <div id="page-container">
    <!-- Main Container -->
    <main id="main-container">
      @yield('content')
    </main>
    <!-- END Main Container -->
  </div>
  <!-- END Page Container -->
  @livewireScripts
</body>

</html>
