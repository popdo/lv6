@extends('layouts.gm')
@section('title','管理中心')

@section('content')
<div class="card">
    <div class="card-hd">欢迎回来，{{ Auth::user()->name }}!</div>

    <div class="card-bd">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        You are logged in!
    </div>
</div>
@endsection
