<section class="user-info text-center mb-3">
    <a class="mx-auto d-inline-block" href="{{ route('user.show', $user->id) }}">
        <img width="100" height="100" src="{{ $user->avatars() }}" alt="{{ $user->name }}" class="gravatar o"/>
    </a>
    <h2 class="mt-2 mb-3">{{ $user->name }}</h2>
    <div class="follow_btn mb-4">
        @auth
            @include('follow._follow_btn',[
                'btn_class' => 'btn-sm',
            ])
        @endauth
    </div>
    <div class="user_atten flex-xy-center">
        <dl class="item px-4 bo-right">
            <dt class="num">
                <a href="{{ route('user.followings',$user->id) }}">{{ count($user->followings) }}</a>
            </dt>
            <dd class="text-muted">关注</dd>
        </dl>
        <dl class="item px-4 bo-right">
            <dt class="num">
                <a href="{{ route('user.followers',$user->id) }}">{{ count($user->followers) }}</a>
            </dt>
            <dd class="text-muted">粉丝</dd>
        </dl>
        <dl class="item px-4">
            <dt class="num">
                {{-- <a href="{{ route('users.show',$user->id) }}">{{ $user->statuses()->count() }}</a> --}}
                0
            </dt>
            <dd class="text-muted">喜欢</dd>
        </dl>

    </div>
</section>