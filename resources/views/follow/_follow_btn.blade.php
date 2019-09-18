@can('follow',$user)
    @if (Auth::user()->is_followed($user->id))
        <form action="{{ route('follow.destroy',$user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn obtn {{ $btn_class }}">取消关注</button>
        </form>
    @else
        <form action="{{ route('follow.store',$user->id) }}" method="post">
            @csrf
            <button class="btn obtn-secondary {{ $btn_class }}">关注</button>
        </form>
    @endif
@endcan