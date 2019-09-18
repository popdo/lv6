<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title',config('app.name', 'Laravel'))</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://ued.com/assets/css/all.min.css">
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1256328_rm84n6rg1z.css">
</head>
<body>
    <header class="header has-shadow">
        @include('inc._navbar')
    </header>
    <main id="app" class="main container-fluid">
        @include('inc._message')
        @yield('content')
    </main>
    <footer class="footer border-top py-2 text-muted mt-auto">
        @include('layouts.footer')
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('script')

</body>
</html>
