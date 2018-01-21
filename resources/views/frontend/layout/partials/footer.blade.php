<footer id="footer" class="sm-padding bg-dark">
    <!-- Container -->
    <div class="container">
        <!-- Footer Banner -->
        <a href="{{ $bannerFooter ? $bannerFooter->url : '' }}">
            <img class="img-responsive" style="padding-bottom: 60px;" src="{{ $bannerFooter ? asset('/images/banner/'.$bannerFooter->image) : '' }}" alt="banner">
        </a>
        <!-- Footer Banner -->
        <!-- Row -->
        <div class="row">

            <div class="col-md-12">

                <!-- footer logo -->
                <div class="footer-logo">
                    <a href="{{ route('home.index') }}">
                        <h2 class="logo white-text">IDauTu.com</h2>
                    </a>
                </div>
                <!-- /footer logo -->

                <!-- footer follow -->
                <ul class="footer-follow">
                    <li>
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-telegram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                </ul>
                <!-- /footer follow -->

                <!-- footer copyright -->
                <div class="footer-copyright">
                    <p>Copyright © 2017. All Rights Reserved.</p>
                </div>
                <!-- /footer copyright -->

            </div>

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</footer>
<!-- Back to top -->
<div id="back-to-top"></div>
<!-- /Back to top -->

<!-- Preloader -->
<div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- /Preloader -->
