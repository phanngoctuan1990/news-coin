<div id="numbers" class="section sm-padding">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('./images/front/bg_coin.jpg');">
        <div class="overlay"></div>
    </div>
    {{ Visitor::log() }}
    <!-- /Background Image -->
    <!-- Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- number -->
            <div class="col-sm-3 col-md-6">
                <div class="row">
                    <!-- number -->
                    <div class="col-sm-3 col-md-6">
                        <div class="number">
                            <i class="fa fa-users"></i>
                            <h3 class="white-text">
                                <span class="counter">{{ Visitor::count() }}</span>
                            </h3>
                            <span class="white-text">Lượt xem</span>
                        </div>
                    </div>
                    <!-- /number -->

                    <!-- number -->
                    <div class="col-sm-3 col-md-6">
                        <div class="number">
                            <i class="glyphicon glyphicon-bitcoin"></i>
                            <h3 class="white-text">
                                <span class="counter">{{ $totalCoin }}</span>
                            </h3>
                            <span class="white-text">Coin</span>
                        </div>
                    </div>
                    <!-- /number -->
                </div>
            </div>
            <!-- embed -->
            <div class="col-sm-3 col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="{{ $linkYoutube ? $linkYoutube->url : '' }}" frameborder="0" gesture="media"
                        allow="encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
            <!-- /embed -->
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
</div>
