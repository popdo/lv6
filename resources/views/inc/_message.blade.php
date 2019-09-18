@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(session()->has($msg))
        <div class="alert alert-{{ $msg }} mb-2">
            <i class="icon icon-msg-{{ $msg }} text-{{ $msg }}"></i>
            <span>{{ session()->get($msg) }}</span>
        </div>
    @endif
@endforeach