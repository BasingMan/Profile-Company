<section id="contact" class="contact">
    <div class="container">

        <div class="section-header">
            <h2>Contact Us</h2>
            <p>Profile Company</p>
        </div>

    </div>

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.579025727931!2d107.65531137499666!3d-6.940809093059221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e81a123dc2fb%3A0xa9a29e86cde8155a!2sTriwikrama!5e0!3m2!1sid!2sid!4v1710305363388!5m2!1sid!2sid"
            frameborder="0" allowfullscreen></iframe>
    </div><!-- End Google Maps -->

    <div class="container">

        <div class="row gy-5 gx-lg-5">

            <div class="col-lg-4">

                <div class="info">
                    <h3>Get in touch</h3>
                    <hr>

                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            <p>{{ $parameter['address'] }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>{{ $parameter['email'] }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p>{{ $parameter['phone'] }}</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

            </div>


            <div class="col-lg-8">

        
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
        
                <form action="{{ route('frontend.mail.main') }}" method="post" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject"
                            placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control textarea" name="message"  placeholder="Message" required></textarea>
                    </div>
                    <br>
                    <div class="text-center" style="margin-left: 70%"><button type="submit">Send Message</button></div>

                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>
    
<style>

.form-control.textarea {
    height: 200px; 
    resize: vertical;
}

.form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

.form-group {
    margin-bottom: 20px;
}

button[type="submit"] {
    background-color: #1b9fdd;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button[type="submit"]:hover {
    background-color: #1b9fdd;
}

.text-center {
    text-align: center;
}

.loading:after {
    content: "";
    width: 20px;
    height: 20px;
    border: 2px solid #ffffff;
    border-top: 2px solid #007bff;
    border-radius: 50%;
    display: inline-block;
    animation: spin 1s linear infinite;
    vertical-align: middle;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>


</section>