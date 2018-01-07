<header id="home">
    <nav id="nav" class="navbar">
        <div class="container">
            <div class="navbar-header">
                <div class="navbar-brand">
                    <a href="{{ route('home.index') }}">
                        <img class="logo" src="{{ '/images/front/logo.png' }}" alt="logo">
                        <img class="logo-alt" src="{{ '/images/front/logo-alt.png' }}" alt="logo">
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
