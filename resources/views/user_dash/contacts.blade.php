@extends('layouts.user_dashboard')
@section('current_section')

{{-- custom css --}}
<link href="{{asset('homepage/assets/css/contacts.css')}}" rel="stylesheet">
<link href="{{asset('homepage/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">

  <h3 class='section-header mb-2'><i class="fas fa-phone"></i> Contact Us</h3>
  <hr>

  <section id="contact" class="contact">
    <div class="container">
      <br>
        <div class="" data-aos="fade-up" data-aos-delay="100">
          <div class="contact-about">
            <h3>Filipino Freelance Coaching</h3>
            <p>If you have any questions about the services we provide simply use the form below. We try to respond to all queries and comments within 24 hours.</p>
          </div>
        </div>

        <br>
        <div class=" mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
          <div class="info">

            <div>
              <a href="https://facebook.com/filipinofreelancecoaching/"><i class="ri-facebook-fill"></i></a>
              <p>Your Digital Marketing Expert</p>
            </div>

            <div>
              <i class="ri-map-pin-line"></i>
              <p>Fontanilla Homes,
                Mexico, Pampanga
                </p>
            </div>

            <div>
              <i class="ri-mail-send-line"></i>
              <p>
                admin@thefilipinofreelancecoaching.com
            </p>
            </div>

            <div>
              <i class="ri-phone-line"></i>
              <p>+639994575088</p>
            </div>

          </div>
        </div>
        <br>
        <div  data-aos="fade-up" data-aos-delay="300">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button class='w-100' type="submit">Send Message</button></div>
          </form>
        </div>


    </div>
  </section><!-- End Contact Section -->
@endsection