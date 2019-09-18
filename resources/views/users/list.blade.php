@extends('layouts.app')
@section('title',$title)

@section('content')
<div class="card">
    <div class="card-hd">
        <h5>{{ $title }}</h5>
    </div>
    <div class="card-bd pt-0">
    @if ($users->count()>0)
    <ul class="user-list row pl-0" style="list-style:none">
        @foreach ($users as $user)
        <li class="col-md-6 col-lg-4 mb-4">
            <div class="d-flex bo-sm shadow-xs p-4">
                <a class="mr-3" href="{{ route('user.show',$user->id) }}"><img class="avatar-md o mbg-info" src="{{ $user->avatars() }}" alt="{{ $user->name }}"></a>
                <div class="info w-100">
                    <b>{{ $user->name }}</b>
                    <div class="card-text flex-y-center mt-2">
                        <small class="text-muted d-inline-block">{{ $user->created_at->diffForHumans() }}</small>
                        <div class="is-group ml-auto">
                            @include('follow._follow_btn',['btn_class'=>'btn-xxs'])
                        </div>
                    </div>
                </div>
            </div>

        </li>
        @endforeach
    </ul>
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
    @endif
    </div>
</div>
@endsection

@section('script')

@endsection