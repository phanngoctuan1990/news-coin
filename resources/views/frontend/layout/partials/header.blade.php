<header id="home">
    <nav id="nav" class="navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a href="{{ route('home.index') }}">
                        <h2 class="logo custom-padding black-text">IDauTu.net</h2>
                    </a>
                </div>
                <div class="nav-collapse">
                    <span></span>
                </div>
            </div>
            <ul class="main-nav nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('home.index') }}">Trang chủ</a>
                </li>
                <li>
                    <a href="#blog">Tin tức</a>
                </li>
                <li>
                    <a href="#contact">Liên hệ</a>
                </li>
                @if(Auth::check())
                <li>
                    <a>{{ Auth::user()->name }}</a>
                </li>
                <li>
                    <a href="{{ route('get.logout') }}">Đăng xuất</a>
                </li>
                @else
                <li>
                    <a href="{{ route('get.login') }}">Đăng nhập</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
