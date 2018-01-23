@extends('frontend.layout.master')
@section('content')
<div id="blog">
    <div class="container">
        <!-- Header Banner -->
        <a href="https://google.com.vn">
            <img style="padding-bottom: 60px;" class="img-responsive" src="{{ $bannerHeader ? asset('/images/banner/'.$bannerHeader->image) : '' }}" alt="banner">
        </a>
        <!-- Header Banner -->
        <div class="row">
            <main id="main" class="col-md-9">
                <div class="blog">
                    <div class="blog-img">
                        <img class="img-responsive" src="{{ asset('/images/news/original/'. $new->original) }}" alt="" width="500" height="500">
                    </div>
                    <div class="blog-content">
                        <h3>{{ $new->title }}</h3>
                        <p>{!! $new->content !!}</p>
                    </div>
                    <div class="blog-comments">
                        <h3 class="title">Danh sách tin tức</h3>
                        @foreach($listNews as $value)
                        <div class="media">
                            <a href="{{ route('news.show', $value->slug) }}">
                                <div class="media-left">
                                    <img class="media-object" id="news-image" src="{{ asset('/images/news/thumbnail/'. $value->thumbnail) }}" width="85" height="60" alt="">
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{ $value->title }}</h5>
                                    <p><?php echo str_limit(strip_tags($value->content, 200)) ?></p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div style="">{{ $listNews->links() }}</div>
                    <div class="home-wrapper">
                        <!-- Contact -->
                        @include('frontend.layout.partials.contact')
                    </div>
                </div>
            </main>
            <aside id="aside" class="col-md-3">
                <div class="widget">
                    <h3 class="title">Tin tức nổi bật</h3>
                    @foreach($newsPopulare as $newPopulare)
                    <div class="widget-post">
                        <a href="{{ route('news.show', $newPopulare->slug) }}">
                            <img src="{{ asset('/images/news/thumbnail/'. $newPopulare->thumbnail) }}" width="85" height="60" alt="">{{ str_limit($newPopulare->title, 30) }}
                        </a>
                        <ul class="blog-meta">
                            <li>{{ $newPopulare->updated_at }}</li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
