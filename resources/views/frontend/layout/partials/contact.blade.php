<div id="contact" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 class="title">Contact us</h2>
            </div>
            <!-- /Section-header -->

            <!-- contact form -->
            <div class="col-md-8 col-md-offset-2">
                <form class="contact-form" id="form-create-contact" action="{{ route('contact-us.store') }}" method="POST">
                    <input type="text" class="input" name="name" placeholder="Name" required>
                    <input type="email" class="input" name="email" placeholder="Email" required>
                    <input type="text" class="input" name="subject" placeholder="Subject" required>
                    <textarea class="input" name="message" placeholder="Message" required></textarea>
                    {{ csrf_field() }}
                    <button type="submit" class="main-btn">Send message</button>
                </form>
            </div>
            <!-- /contact form -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
