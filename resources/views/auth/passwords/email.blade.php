@extends('layouts.auth')
@section('title','重置密码')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="field">
            <input placeholder="你登录的邮箱" id="email" type="email" class="form-item @error('email') bo-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="form-help text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="field">
            <button type="submit" class="btn btn-primary w-100">
                重置密码
            </button>
        </div>
    </form>
@endsection
