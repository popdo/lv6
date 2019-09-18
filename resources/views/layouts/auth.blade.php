<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','-'.config('app.name', 'Laravel'))</title>
    <link rel="stylesheet" href="http://bt.com/all.min.css">
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1256328_rm84n6rg1z.css">
</head>
<body>
<div class="logo" style="position: absolute;left:20px;top:20px;font-size:1.25rem">
    <a class="site-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>
</div>
{{-- 登录\注册\重置密码\激活账号 等页面模板 --}}
<div class="flex-xy-center vw-100 vh-100">
    <div class="auth-box shadow-sm p-5 o-md bg-white" style="min-width:380px">
        <div class="auth-hd text-center mb-5">
            <h3>@yield('title')</h3>
        </div>
        <div class="auth-bd">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>