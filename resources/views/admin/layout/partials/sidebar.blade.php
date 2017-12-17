<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ areActiveRoutes(['admin.dashboard']) }}">
                <a href="{{ route('admin.dashboard') }}"><span>Dashboard</span></a>
            </li>
            <li class="treeview {{ areActiveRoutes(['admin.user.index', 'admin.user.create']) }}">
                <a href="#">
                    <span>Tài khoản</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ areActiveRoutes(['admin.user.index']) }}"><a href="{{ route('admin.user.index') }}"><i class="fa fa-circle-o"></i> Danh sách tài khoản</a></li>
                    <li class="{{ areActiveRoutes(['admin.user.create']) }}"><a href="{{ route('admin.user.create') }}"><i class="fa fa-circle-o"></i> Tạo mới tài khoản</a></li>
                </ul>
            </li>
            <li class="treeview {{ areActiveRoutes(['admin.news.index', 'admin.news.create']) }}">
                <a href="#">
                    <span>Tin tức</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ areActiveRoutes(['admin.news.index']) }}"><a href="{{ route('admin.news.index') }}"><i class="fa fa-circle-o"></i> Danh sách bài viết</a></li>
                    <li class="{{ areActiveRoutes(['admin.news.create']) }}"><a href="{{ route('admin.news.create') }}"><i class="fa fa-circle-o"></i> Tạo bài viết</a></li>
                </ul>
            </li>
            <li class="treeview {{ areActiveRoutes(['admin.coin.index', 'admin.coin.create']) }}">
                <a href="#">
                    <span>Coin</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ areActiveRoutes(['admin.coin.index']) }}"><a href="{{ route('admin.coin.index') }}"><i class="fa fa-circle-o"></i> Danh sách Coin</a></li>
                    <li class="{{ areActiveRoutes(['admin.coin.create']) }}"><a href="{{ route('admin.coin.create') }}"><i class="fa fa-circle-o"></i> Tạo Coin</a></li>
                </ul>
            </li>		
        </ul>
    </section>
</aside>