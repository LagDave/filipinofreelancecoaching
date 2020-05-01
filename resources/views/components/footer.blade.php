  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            Copyright  © 2019 Filipino Freelance Coaching. All rights reserved
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            @if(!Auth::check())
              <a href="/login">Login</a>
              <a href="/register">Register Now</a>
            @endif
            @if(Auth::check())
              @if(Auth::user()->plan == 'has_plan' || Auth::user()->plan == 'admin')
                <a href="/home/policies">Policies</a>
              @endif
            @endif

            
            
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->
