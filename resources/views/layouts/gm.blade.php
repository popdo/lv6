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
    {{-- <link rel="stylesheet" href="http://ued.com/assets/css/all.min.css"> --}}
    <link rel="stylesheet" href="http://bt.com/all.min.css">
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1256328_rm84n6rg1z.css">
</head>
<body>
@include('inc._navbar')
<main id="app" class="main container py-5">
    @include('inc._message')
    <div class="row">
        <div class="col-md-2 position-relative">
            @include('admin._sidebar')
        </div>
        <div class="col-md-10">
            @yield('content')
        </div>
    </div>
</main>
@include('layouts.footer')

<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}" defer></script> defer延迟加载 --}}
<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>
</html>
