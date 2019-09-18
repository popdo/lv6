@foreach ($posts as $post)
<li class="blog-item bo-top py-3 flex-y-center">
    {{-- <div class="blog-thumb mr-2">
        <img class="avatar-lg o" src="http://www.gravatar.com/avatar/4a409bafb8374043c36e12439a519eba?s=140" alt="">
    </div> --}}
    <div class="blog-content">
        <h4 class="title"><a class="link-dark" href="{{ route('blogs.show',$post->id) }}">{{ $post->title }}</a></h4>
        <div class="metas text-muted a-muted">
            <span class="meta-cats">
                <a href="">前端开发</a>
            </span>
            <span class="meta-time">
                {{ $post->created_at->diffForHuMans() }}
            </span>
            <span class="meta-view text-muted">
                    <i class="icon icon-view-m"></i><span>200</span>
            </span>
        </div>
        @can('self', $post)
        {{-- <div class="is-group mt-2">
            <button class="item btn is-sm is-default text-muted">
            <i class="icon icon-edit"></i>
            </button>
            <button class="item btn is-sm is-default text-muted">
            <i class="icon icon-delete-m"></i>
            </button>
        </div> --}}
            <post-edit-bar route="{{ route('blogs.destroy',$post) }}"></post-edit-bar>
        @endcan
    </div>
    <div class="blog-tools ml-auto">
        <div class="is-group">
            <button class="item btn btn-sm obtn text-muted">
                <i class="icon icon-like-m"></i><span>260</span>
            </button>
            <button class="item btn btn-sm obtn text-muted">
                <i class="icon icon-msgs-m"></i><span>{{ $post->comment_count }}</span>
            </button>
        </div>
        
    </div>
</li>
@endforeach