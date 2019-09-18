<header class="header has-shadow mb-3 mb-md-5">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="icon icon-msgs-b mr-1" style="font-size:20px"></i>
            {{ $options['site_name'] ?: config('app.name') }}
        </a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="my-nav" class="collapse navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">首页</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">设计</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">前端</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">微博</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav nav-right">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">登录</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">注册</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link position-relative py-0 px-2" href="{{ route('login') }}">
                            <i class="dot dot-sm free-tr bg-danger bo-none"></i>
                            <i class="icon icon-msg-b">
                            </i>
                        </a>
                    </li>
                    <li class="nav-item dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a class="nav-link dropdown-toggle" href="{{ route('login') }}"><i class="icon icon-add-m"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href=""><i class="icon icon-edit"></i><span>发布文章</span></a>
                            <a class="dropdown-item" href=""><i class="icon icon-smile-m"></i><span>分享心情</span></a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a class="nav-link dropdown-toggle flex-y-center" href="{{ route('user.show',Auth::user()) }}">
                            <span class="u-face mr-2"><img class="aravat-sm o" src="{{ Auth::user()->avatars() }}" width="32" height="32"></span>
                            <div class="u-info">
                                {{-- @if (Auth::user()->is_admin)
                                <span class="level">管理员</span>
                                @endif --}}
                                <span class="name">{{ Auth::user()->name }}</span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- @if (Auth::user()->is_admin) --}}
                            @can('admin-home', Auth::user())
                            <a href="{{ route('home') }}" class="dropdown-item">
                                <i class="icon icon-edit-m"></i>
                                <span>管理中心</span>
                            </a>
                            @endcan
                            {{-- @endif --}}
                                <a href="{{ route('user.show',Auth::user()) }}" class="dropdown-item">
                                    <i class="icon icon-admin-m"></i>
                                    <span>个人中心</span>
                                </a>
                                <a href="{{ route('user.edit',Auth::user()) }}" class="dropdown-item">
                                    <i class="icon icon-write-m"></i>
                                    <span>编辑资料</span>
                                </a>
                                <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn obtn btn-sm w-100">
                                        <span>退出</span>
                                        </button>
                                    </form>
                                    {{-- <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a> --}}
                            </ul>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>