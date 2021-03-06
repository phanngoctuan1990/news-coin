@extends('frontend.layout.master')
@section('content')
<div id="about" class="section">
    <!-- Container -->
    <div class="container">
        <!-- Header Banner -->
        <a href="{{ $bannerHeader ? $bannerHeader->url : '' }}">
            <img class="img-responsive" src="{{ $bannerHeader ? asset('/images/banner/'.$bannerHeader->image) : '' }}" alt="banner">
        </a>
        <!-- Header Banner -->
        <!-- Filter -->
        <div class="row cls-menu-filter">
            <!-- Right filter -->
            <div class="col-lg-6">

            </div>
            <!-- Right filter -->
            <!-- Left filter -->
            <div class="col-lg-6">
                <ul class="sub-nav nav nav-pills navbar-right">
                    <li role="presentation">
                        <a href="#" class="coin-filter" value="{{ \App\Models\Coin::TYPE_ALL }}">All</a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="coin-filter" value="{{ \App\Models\Coin::TYPE_ENDED }}">Ended</a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="coin-filter" value="{{ \App\Models\Coin::TYPE_EXCHANGE }}">Exchange</a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="coin-filter" value="{{ \App\Models\Coin::TYPE_ICO }}">ICO</a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="coin-filter" value="{{ \App\Models\Coin::TYPE_ICO_TODAY }}">ICO Today</a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="coin-filter" value="{{ \App\Models\Coin::TYPE_SCAM }}">Scam</a>
                    </li>
                </ul>
            </div>
            <!-- Left filter -->
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover" id="coins-home">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th></th>
                        <th>Rate</th>
                        <th>Hype</th>
                        <th>Scam</th>
                        <th>Moom</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Trạng thái</th>
                        <th>Giá</th>
                        <th>Danh mục</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Table -->
    </div>
    <!-- /Container -->
</div>
<!-- Blogs -->
@include('frontend.layout.partials.blog')
<!-- Feature -->
<!-- Ads Slide -->
@include('frontend.layout.partials.ads-slide')
<!-- Ads Slide -->
@include('frontend.layout.partials.feature')
<!-- Numbers -->
@include('frontend.layout.partials.number')
<!-- Contact -->
@include('frontend.layout.partials.contact')
@endsection
