<div id="blog" class="section sm-padding bg-grey">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">Tin tức mới nhất</h2>
            </div>
            @foreach($news as $new)
            <div class="col-md-4">
                <div class="blog">
                    <div class="blog-img">
                        <img class="img-responsive" src="{{ asset('images/news/thumbnail/'. $new->thumbnail) }}" alt="">
                    </div>
                    <div class="blog-content">
                        <h3>{{ $new->title }}</h3>
                        <p><?php echo str_limit(strip_tags($new->content, 300)) ?></p>
                        <a href="{{ route('news.show', $new->slug) }}">Xem thêm</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
