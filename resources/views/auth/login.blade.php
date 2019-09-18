@extends('layouts.auth')
@section('title','登录')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="field">
        <input placeholder="邮箱" id="email" type="email" class="form-item @error('email') bo-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="form-help text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="field">
        <input placeholder="密码" id="password" type="password" class="form-item @error('password') bo-danger @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="form-help text-danger">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="field">
        <input class="is-checkbox is-success" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="text-muted" for="remember">记住密码</label>
    </div>
    <div class="field">
        <button type="submit" class="btn btn-primary w-100">登 录</button>
    </div>
    <hr>
    <div class="field flex-y-center mb-0">
        @if (Route::has('register'))
            <a class="" href="{{ route('register') }}">注册账号</a>
        @endif

        @if (Route::has('password.request'))
            <a class="ml-auto" href="{{ route('password.request') }}">
                忘记密码?
            </a>
        @endif
    </div>
</form>
@endsection
