@extends('frontend.layout.master')
@section('content')
<div id="blog" class="section sm-padding">
    <div class="container">
        <!-- Header Banner -->
        <a href="https://google.com.vn">
            <img style="padding-bottom: 60px;" class="img-responsive" src="{{ $bannerHeader ? asset('/images/banner/'.$bannerHeader->image) : '' }}" alt="banner">
        </a>
        <!-- Header Banner -->
        <div class="row">
            <main id="main">
                <div class="blog">
                    <div class="blog-img col-md-8">
                        <img class="img-responsive" src="{{ asset('/images/coins/original/'. $coin->thumbnail) }}" width="500" height="500">
                    </div>
                    <div class="blog-img col-md-4">
                    	<h3>Thông tin coin</h3>
                        <p><b>Tiêu đề:</b> {{ $coin->name }}</p>
                        <p><b>Rate:</b> {{ $coin->rate }}</p>
                        <p><b>Hype:</b> {!! \App\Models\Coin::$convertCoinType[$coin->hype] !!}</p>
                        <p><b>Scam:</b> {!! \App\Models\Coin::$convertCoinType[$coin->scam] !!}</p>
                        <p><b>Moom:</b> {!! \App\Models\Coin::$convertCoinType[$coin->moom] !!}</p>
                        <p><b>Ngày bắt đầu:</b> {{ $coin->start_date }}</p>
                        <p><b>Ngày kết thúc:</b> {{ $coin->end_date }}</p>
                        <p><b>Trạng thái:</b> {!! \App\Models\Coin::$convertCoinStage[$coin->stage] !!}</p>
                        <p><b>Giá:</b> ${{ round($coin->price) }}</p>
                        <p><b>Danh mục:</b> {{ $coin->category->name }}</p>
                    </div>
                    <div class="blog-content col-md-12">
                    	@if($coin->content)
	                        <h3>{{ $coin->name }}</h3>
	                        <p>{!! $coin->content !!}</p>
                        @else
                        	<h3>{{ $coin->name }} chưa có bài viết</h3>
                        @endif
                    </div>
                    <div class="table-responsive col-md-12">
                    	<hr>
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
                    <div class="home-wrapper col-md-12">
                        @include('frontend.layout.partials.contact')
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
