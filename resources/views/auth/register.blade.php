@extends('layouts.auth')
@section('title','注册')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="field">
            <input placeholder="你的昵称" id="name" type="text" class="form-item @error('name') bo-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="form-help text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="field">
            <input placeholder="邮箱" id="email" type="email" class="form-item @error('email') bo-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="form-help text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="field">
            <input placeholder="设置密码" id="password" type="password" class="form-item @error('password') bo-danger @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="form-help text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="field">
            <input placeholder="确认密码" id="password-confirm" type="password" class="form-item" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="field mb-0">
            <button type="submit" class="btn btn-primary w-100">
                现在注册
            </button>
        </div>
    </form>
@endsection
