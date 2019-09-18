<div class="aside position-sticky py-5 mt-n5" style="top:0;left:0">
    <ul class="nav flex-md-column links-dark bo-right mt-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon icon-chart-s"></i>
                <span>管理首页</span>
            </a>
        </li>
        <li class="nav-item flex-y-center">
            <a class="nav-link" href="{{ route('home.blogs') }}">
                <i class="icon icon-idea-s"></i>
                <span>文章管理</span>
            </a>
            <a href="" class="nav-link px-0">
                <span class="o badge badge-success obadge-xs">+</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link flex-y-center" href="http://">
                <i class="icon icon-pinglun2"></i> 
                <span>评论管理</span>
                {{-- <span class="dot bg-danger ml-1"></span> --}}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://">
                <i class="icon icon-post-s"></i>
                <span>页面管理</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://">
                <i class="icon icon-setting-"></i>
                <span>分类管理</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="icon icon-guanliyuan"></i>
                <span>用户管理</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('options.edit') }}">
                <i class="icon icon-setting-s"></i>
                <span>站点设置</span>
            </a>
        </li>
    </ul>
</div>