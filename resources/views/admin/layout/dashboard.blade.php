@extends('admin.layout.master')
@section('title', 'Trang chủ')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Trang chủ
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Tài khoản</h3>

                    <p>quản lý</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{ route('admin.user.index') }}" class="small-box-footer">Danh sách tài khoản <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>Tin tức</h3>

                    <p>quản lý</p>
                </div>
                <div class="icon">
                    <i class="ion ion-compose"></i>
                </div>
                <a href="{{ route('admin.news.index') }}" class="small-box-footer">Danh sách tin tức <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Coin</h3>

                    <p>quản lý</p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd"></i>
                </div>
                <a href="{{ route('admin.coin.index') }}" class="small-box-footer">Danh sách coin <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>Thể loại</h3>

                    <p>quản lý</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-book-outline"></i>
                </div>
                <a href="{{ route('admin.category-coin.index') }}" class="small-box-footer">Danh sách thể loại coin <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</section>
@endsection