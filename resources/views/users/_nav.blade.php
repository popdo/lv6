<div class="text-center mb-4">
    <ul class="nav links-dark justify-content-center bo py-2 px-3 mx-3 oo d-inline-flex">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.show',$user->id) }}">
                <i class="icon icon-post-s"></i>
                <span>中心首页</span>
            </a>
        </li>
        <li class="nav-item flex-y-center">
            <a class="nav-link" href="{{ route('blogs.op',$user->id) }}">
                <i class="icon icon-idea-s"></i>
                <span>Ta的文章</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://">
                <i class="icon icon-pinglun2"></i> 
                <span>Ta的微博</span>
                {{-- <span class="dot bg-danger ml-1"></span> --}}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.edit',$user->id) }}">
                <i class="icon icon-post-s"></i>
                <span>编辑资料</span>
            </a>
        </li>
    </ul>
</div>