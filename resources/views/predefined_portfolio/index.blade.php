<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS only -->
    <link rel="stylesheet" href="{{asset('css/'.$portfolio_entry->theme.'.css')}}" />
    <link rel="stylesheet" href="{{asset('css/portfolio-main.css')}}" />

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
    />
    <!-- JS, Popper.js, and jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>

    <title>{{$portfolio_entry->full_name}}</title>
  </head>
  <body>
    <!-- Navigation bar START -->

    <nav class="navbar shadow navbar-expand-lg sticky-top navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">{{$portfolio_entry->full_name}}</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#jumbotron">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#projects">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#certificates">Certificates</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contacts">Contacts</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Navigation bar END -->

    <!-- Jumbotron START -->

    <div class="jumbotron" id="jumbotron">
      <div
        class="container d-flex flex-column justify-content-center align-items-center"
      >
        <img data-aos="fade-up" src="{{url($portfolio_entry->profile_pic)}}" alt="" class="profile" />
        <h3
          data-aos="fade-right"
          data-aos-delay="300"
          class="mt-3 text-center display-4"
        >
          Hi, I am {{$portfolio_entry->full_name}}
        </h3>
        <h6 data-aos="fade-left" data-aos-delay="500" class="text-center mt-2">
          {{$portfolio_entry->role}}
        </h6>

        <div class="socmed-icons mt-3">
          @if($portfolio_entry->facebook_link != NULL)
          <a href="{{$portfolio_entry->facebook_link}}">
              <img
                data-aos="fade-up"
                data-aos-delay="700"
                class="mx-1"
                src="{{asset('portfolio-images/facebook.png')}}"
              />
            </a>
          @endif
          @if($portfolio_entry->twitter_link != NULL)
            <a href="{{$portfolio_entry->twitter_link}}">
              <img
                data-aos="fade-up"
                data-aos-delay="900"
                class="mx-1"
                src="{{asset('portfolio-images/twitter.png')}}"
              />
            </a>
          @endif
          @if($portfolio_entry->linkedin_link != NULL)
          <a href="{{$portfolio_entry->linkedin_link}}">
            <img
              data-aos="fade-up"
              data-aos-delay="1100"
              class="mx-1"
              src="{{asset('portfolio-images/in.png')}}"
            />
          </a>
          @endif
          @if($portfolio_entry->instagram_link != NULL)
            <a href="{{$portfolio_entry->instagram_link}}">
              <img
                data-aos="fade-up"
                data-aos-delay="1300"
                class="mx-1"
                src="{{asset('portfolio-images/instagram.png')}}"
              />
            </a>  
          @endif
          
          @if($portfolio_entry->resume_link != NULL)
            <a
            href="{{$portfolio_entry->resume_link}}"
            target="_blank"
              data-aos="fade-left"
              data-aos-delay="1500"
              class="ml-3 btn btn-primary"
            >
              <i class="fas fa-download"></i> Download Resume
            </a>
          @endif
        </div>

        <div class="freelance-sites">
          <p data-aos='fade-up' data-aos-delay=1500 class='my-3'>
            <small>
            @if($portfolio_entry->online_jobs_link != NULL)
            <a class='text-primary' href="{{$portfolio_entry->online_jobs_link}}">
              Online Jobs PH
            </a>
            @endif
            @if($portfolio_entry->upwork_link != NULL)
            <a class='text-primary' href="{{$portfolio_entry->upwork_link}}">
              | UpWork
            </a>
            @endif
            @if($portfolio_entry->freelancer_link != NULL)
            <a class='text-primary' href="{{$portfolio_entry->freelancer_link}}">
              | Freelancer
            </a>
            @endif
            @if($portfolio_entry->fiver_link != NULL)
            <a class='text-primary' href="{{$portfolio_entry->fiver_link}}">
              | Fiverr
            </a>
            @endif
          </small>
          </p>
        </div>
      </div>
    </div>

    <!-- Jumbotron END -->

    <!-- About start -->
    <div id="about" class="my-5 py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            {!! $portfolio_entry->intro_video !!}
          </div>
          <div class="col-lg-6">
            <h3 data-aos="fade-left" data-aos-delay="200">
              <i class="text-primary fas fa-info-circle"></i> About Me
            </h3>
            <hr />
            <p data-aos="fade-left" data-aos-delay="300">
              {{$portfolio_entry->about_content}}
            </p>
            @if($portfolio_entry->resume_link != NULL)
            <a
            href="{{$portfolio_entry->resume_link}}"
            target="_blank"
              data-aos="fade-left"
              class="btn btn-primary"
            >
              <i class="fas fa-download"></i> Download Resume
            </a>
          @endif
          </div>
        </div>
      </div>
    </div>
    <!-- About end -->

    <!-- Certificates -->
    <div class="my-5 py-5" id="certificates">
      <div class="container px-3 py-3">
        <h2 class="text-center" data-aos="fade-right">
          <i class="fas text-primary fa-certificate"></i> Certificates
        </h2>
        <p class="text-center" data-aos="fade-right">
          Papers to certify my accomplishments and completions in related
          academic materials.
        </p>
        <br /><br />
        <div class="row">

          @foreach($featured_certificates as $certificate)
            <div data-aos="zoom-in" data-aos-delay="100" class="col-lg-4 col-md-6 mb-2">
              <div class="card shadow-sm">
                <img class="img-fluid" src="{{$certificate->image}}" alt="" />
                <div class="card-body">
                  <h5 class="card-title">{{$certificate->title}}</h5>
                  <p class="card-text">
                    {{$certificate->description}}
                  </p>
                </div>
              </div>
            </div>
          @endforeach


        </div>
        <div class="row mt-5">
          @foreach($non_featured_certificates as $certificate)
          <div data-aos="fade-up" class="col-lg-2 col-md-4 col-sm-6 mb-5">
            <img
              
              src="{{$certificate->image}}"
              alt=""
              class="img-fluid mb-2"
            />
            <small>{{$certificate->title}}</small>
          </div>
          @endforeach
        </div>

      </div>
    </div>
    <!-- Certificates End -->

    <!-- Projects -->
    <div id="projects">
      <h2 data-aos='fade-right' class="text-center">
        <i class="fas fa-project-diagram text-primary"></i> Projects
      </h2>
      <p data-aos='fade-right' class="text-center">
        Here are my latest works during the course of my experience in the
        industry.
      </p>
      <div data-aos='fade-up' class="my-0 py-5 bg-primary">
        <div class="container">
          <div data-aos='zoom-in' data-aos-delay='200' class="projects-slider">
  
            @foreach($projects as $project)
              <div>
                <div class="card py-2 px-2 card-body mx-1">
                  <div class="row">
                    <div style="position: relative;" class="col-4 image-container">
                      <div
                        class="image"
                        style="
                          position: absolute;
                          height: 100%;
                          width: 100%;
                          background: url('{{$project->thumbnail}}');
                          background-position: center;
                          background-size: cover;
                          background-repeat: no-repeat;
                        "
                      ></div>
                    </div>
                    <div class="text-container pl-4 col-8">
                      <strong class="text-primary"
                      >{{$project->title}}</strong
                      >
                      <br />
                      <p>
                        {{$project->description}}
                      </p>
                      <a href="{{$project->link}}" class="btn btn-primary"
                        ><i class="fas fa-external-link-alt"></i> Learn More</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
  
  
          </div>
  
          </div>
        </div>
      </div>
    </div>
    <!-- Projects End -->

    <!-- Footer Start -->
    <footer id='contacts' class="my-0 py-5 bg-dark">
      <div data-aos='zoom-in' class='container'>
        <h3><i class="fas fa-phone"></i> Get in Touch</h3>
        <br><br>
        <div class="row">
          <div class="col-lg-6">
            <form  class="form">
              <div class="form-group">
                <label>Full Name:</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control">
              </div>
              <div class="form-group">
                <label>Message</label>
                <textarea name="" id="" rows='10' class="form-control"></textarea>
              </div>
              <p class='text-right'>
                <button class="btn btn-primary"><i class="fas fa-envelope"></i> Send Email</button>
              </p>
              
            </form>
          </div>
          <div class="col-lg-6">
            <p class='text-white'><i class="fas fa-map-marker-alt mr-2"></i> {{$portfolio_entry->address}}</p>
            <br>
            <p class='text-white'><i class="fas fa-phone mr-2"></i> {{$portfolio_entry->phone_number}}</p>
            <br>
            <p class='text-white'><i class="fas fa-envelope mr-2"></i> {{$portfolio_entry->email}}</p>
            <br>
            <div class='divider'></div>
            <br>
              <p>
              @if($portfolio_entry->online_jobs_link != NULL)
              <a class='text-white' href="{{$portfolio_entry->online_jobs_link}}">
                Online Jobs PH
              </a>
              @endif
              </p>
              <p>
              @if($portfolio_entry->upwork_link != NULL)
              <a class='text-white' href="{{$portfolio_entry->upwork_link}}">
                UpWork
              </a>
              @endif
              </p>
              <p>
              @if($portfolio_entry->freelancer_link != NULL)
              <a class='text-white' href="{{$portfolio_entry->freelancer_link}}">
                Freelancer
              </a>
              @endif
              </p>
              <p>
              @if($portfolio_entry->fiver_link != NULL)
              <a class='text-white' href="{{$portfolio_entry->fiver_link}}">
                Fiverr
              </a>
              @endif
              </p>
            <br>
            <small class="text-muted">&copy; {{$portfolio_entry->full_name}} | Filipino Freelance Coaching</small>

          </div>
        </div>
      </div>
    </footer>
    <!-- Footer End -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{asset('js/portfolio-main.js')}}"></script>

    <style>
      iframe{
        width:100% !important;
      }
    </style>
  </body>
</html>
