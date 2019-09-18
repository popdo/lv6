@extends('layouts.auth')
@section('title',__('验证邮箱地址'))

@section('content')
    @if (session('resent'))
        <div class="alert alert-info">
            {{ __('新的验证链接已发送到您的电子邮箱。') }}
        </div>
    @endif

    {{ __('在继续之前，请检查您的电子邮箱以获取验证链接。') }}
    {{ __('如果您没有收到该电子邮件') }},
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-primary w-100">{{ __('点这里重新发送') }}</button>.
    </form>
@endsection
