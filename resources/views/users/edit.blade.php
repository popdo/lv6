@extends('layouts.person')
@section('title','编辑资料')
@section('content')
<div class="card">
    {{-- <div class="card-hd">
        <h5>编辑资料</h5>
    </div> --}}
    <div class="card-bd">
        <form action="{{ route('user.update',$user->id) }}" method="post" class="x-form">
            @csrf
            @method('PATCH')
            <div class="field">
                <label class="x-label">昵称</label>
                <div class="field-bd flex-column">
                    <input type="text" name="name" class="form-item @error('name') bo-danger @enderror" value="{{ old('name') ? old('name') :$user->name }}" required>
                    @error('name')
                        <span class="form-help text-danger w-100">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="x-label">邮箱</label>
                <div class="field-bd flex-column">
                    <input type="email" name="email" class="form-item" value="{{ $user->email }}" disabled>
                </div>
            </div>
            <div class="field">
                <label class="x-label">密码</label>
                <div class="field-bd flex-column">
                    <input type="password" name="password" class="form-item @error('password') bo-danger @enderror" placeholder="留空不修改密码">
                    @error('password')
                    <span class="form-help text-danger w-100">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label class="x-label">确认密码</label>
                <div class="field-bd flex-column">
                    <input type="password" name="password_confirmation" class="form-item">
                </div>
            </div>
            <div class="field">
                <label class="x-label"></label>
                <div class="field-bd">
                    <button type="submit" class="btn btn-primary">提交更新</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection