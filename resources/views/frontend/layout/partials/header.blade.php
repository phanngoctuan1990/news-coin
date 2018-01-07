<header id="home">

    <!-- Nav -->
    <nav id="nav" class="navbar">
        <div class="container">

            <div class="navbar-header">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="http://idautu.net/">
                        <img class="logo" src="{{ '/images/front/logo.png' }}" alt="logo">
                        <img class="logo-alt" src="{{ '/images/front/logo-alt.png' }}" alt="logo">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Collapse nav button -->
                <div class="nav-collapse">
                    <span></span>
                </div>
                <!-- /Collapse nav button -->
            </div>

            <!--  Main navigation  -->
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
            </ul>
            <!-- /Main navigation -->

        </div>
    </nav>
    <!-- /Nav -->
</header>
