@extends('layouts.person')
@section('title',$user->name.'的主页')

@section('content')
<div class="card">
    @if ($posts->count()>0)
    <div class="card-hd">
        <h4 class="title">最新动态</h4>
    </div>
    <div class="card-bd pt-0">
        <ul class="blog-list pl-0">
            @include('users._loop_blog')
        </ul>
    </div>
    <div class="card-ft my-2">
        {{ $posts->links() }}
    </div>
    @else
        <p class="text-center text-muted mt-3">轻轻地我走了，正如我轻轻地来，挥一挥手，不带走一片云彩~</p>
    @endif
</div>
@endsection

@section('script')
<script>

let app = new Vue({
    el:"#app",

})
</script>
@endsection

