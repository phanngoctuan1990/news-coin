@extends('frontend.layout.master')
@section('content')
<div class="header-wrapper sm-padding bg-grey">
    <div class="container">
        <h2>Tin tức</h2>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#blog">Tin tức</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="">Bài viết</a>
            </li>
        </ul>
    </div>
</div>
<div id="blog" class="section md-padding">
    <div class="container">
        <div class="row">
            <main id="main" class="col-md-9">
                <div class="blog">
                    <div class="blog-img">
                        <img class="img-responsive" src="{{ asset('/images/news/original/'. $new->original) }}" alt="">
                    </div>
                    <div class="blog-content">
                        <h3>{{ $new->title }}</h3>
                        <p><?php echo $new->content ?></p>
                    </div>
                    <div class="blog-comments">
                        <h3 class="title">Danh sách tin tức</h3>
                        @foreach($listNews as $value)
                        <div class="media">
                            <a href="{{ route('new.show', $value->id) }}">
                                <div class="media-left">
                                    <img class="media-object" src="{{ asset('/images/news/thumbnail/'. $value->thumbnail) }}" width="85" height="60" alt="">
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{ $value->title }}</h5>
                                    <p><?php echo str_limit($value->content, 200) ?></p>
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
                        <a href="{{ route('new.show', $newPopulare->id) }}">
                            <img src="{{ asset('/images/news/thumbnail/'. $newPopulare->thumbnail) }}" width="85" height="60" alt="">{{ str_limit($newPopulare->title, 100) }}
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
