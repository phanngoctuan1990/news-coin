<div id="contact" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 class="title">Liên hệ</h2>
            </div>
            <!-- /Section-header -->

            <!-- contact form -->
            <div class="col-md-8 col-md-offset-2">
                <form class="contact-form" id="form-create-contact" action="{{ route('contact-us.store') }}" method="POST">
                    <input type="text" class="input" name="name" placeholder="Tên người liên hệ" required>
                    <input type="email" class="input" name="email" placeholder="Email liên hệ" required>
                    <input type="text" class="input" name="subject" placeholder="Chủ đề" required>
                    <textarea class="input" name="message" placeholder="Nội dung" required></textarea>
                    {{ csrf_field() }}
                    <button type="submit" class="main-btn">Gửi liên hệ</button>
                </form>
            </div>
            <!-- /contact form -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
