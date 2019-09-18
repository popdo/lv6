@extends('layouts.auth')
@section('title','修改密码'))

@section('content')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="field">
            <input placeholder="邮箱" id="email" type="email" class="form-item @error('email') bo-danger @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="form-help text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="field">
            <input placeholder="新密码" id="password" type="password" class="form-item @error('password') bo-danger @enderror" name="password" required autocomplete="new-password">

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
                修改密码
            </button>
        </div>
    </form>
@endsection
