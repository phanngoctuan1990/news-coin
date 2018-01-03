@extends('frontend.layout.master')
@section('content')
<div id="about" class="section sm-padding">
    <!-- Container -->
    <div class="container">
        <!-- Filter -->
        <div class="row sm-padding">
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
@include('frontend.layout.partials.feature')
<!-- Numbers -->
@include('frontend.layout.partials.number')
<!-- Contact -->
@include('frontend.layout.partials.contact')
@endsection
