<!-- Banner -->
<div id="testimonial" class="section sm-padding">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('/images/front/background.jpg');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Container -->

    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Testimonial slider -->
            <div class="col-md-10 col-md-offset-1">
                <div id="testimonial-slider" class="owl-carousel owl-theme">
                    <!-- image -->
                    @if($adsSlides)
                        @foreach($adsSlides as $adsSlide)
                            <a href="{{ $adsSlide->url }}">
                                <img style="margin: auto; width: 300px; height: 300px" src="{{ asset('/images/banner/'.$adsSlide->image) }}" alt="banner">
                            </a>
                        @endforeach
                    @endif
                    <!-- /image -->
                </div>
            </div>
            <!-- /Testimonial slider -->
        </div>
        <!-- /Row -->
    </div>
    <!-- Container -->
</div>
<!-- /Banner -->