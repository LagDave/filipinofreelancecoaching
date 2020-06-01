<!DOCTYPE html>
<html>
  <head>
    <style>
      html {
        scroll-behavior: smooth;
      }
      .profile {
        height: 150px;
        width: 150px;
        border-radius: 500px;
      }
    </style>
    <title>Solid State by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <link rel="stylesheet" href="{{asset('css/pfolio_main.css')}}" />
    <script src="https://kit.fontawesome.com/e4d9a73074.js" crossorigin="anonymous"></script>
    <noscript
      ><link rel="stylesheet" href="{{asset('css/pfolio_noscript.css')}}"
    /></noscript>
  </head>
  <body class="is-preload">
    <!-- Page Wrapper -->
    <div id="page-wrapper">
      <!-- Header -->
      <header id="header" class="alt">
        <h1><a href="index.html">Rustine Dave</a></h1>
        <nav>
          <a href="#menu">Menu</a>
        </nav>
      </header>

      <!-- Menu -->
      <nav id="menu">
        <div class="inner">
          <h2>Menu</h2>
          <ul class="links">
            <li><a href="index.html">Home</a></li>
            <li><a href="#certificates">Certificates</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contacts">Contacts</a></li>
          </ul>
          <a href="#" class="close">Close</a>
        </div>
      </nav>

      <!-- Banner -->
      <section id="banner">
        <div class="inner">
          <div class="logo">
            <img class="profile" src="{{asset('portfolio/dp.png')}}" alt="" />
          </div>
          <h2>Hi, I am Rustine Dave</h2>
          <p>
            Your Professional Web Developer
          </p>
        </div>
      </section>

      <!-- Wrapper -->
      <section id="wrapper">
        <section id="certificates" class="wrapper spotlight style1">
          <div class="inner">
            <a href="#" class="image"><img src="{{asset('portfolio/pic01.jpg')}}" alt="" /></a>
            <div class="content">
              <h2 class="major">Certificate One</h2>
              <p>
                Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras
                turpis ante, nullam sit amet turpis non, sollicitudin posuere
                urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim
                dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla
                cursus.
              </p>
              <a href="#" class="special">Learn more</a>
            </div>
          </div>
        </section>

        <section class="wrapper alt spotlight style2">
          <div class="inner">
            <a href="#" class="image"><img src="{{asset('portfolio/pic01.jpg')}}" alt="" /></a>
            <div class="content">
              <h2 class="major">Certificate Two</h2>
              <p>
                Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras
                turpis ante, nullam sit amet turpis non, sollicitudin posuere
                urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim
                dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla
                cursus.
              </p>
              <a href="#" class="special">Learn more</a>
            </div>
          </div>
        </section>

        <section class="wrapper spotlight style3">
          <div class="inner">
            <a href="#" class="image"><img src="{{asset('portfolio/pic01.jpg')}}" alt="" /></a>
            <div class="content">
              <h2 class="major">Certificate Three</h2>
              <p>
                Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras
                turpis ante, nullam sit amet turpis non, sollicitudin posuere
                urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim
                dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla
                cursus.
              </p>
              <a href="#" class="special">Learn more</a>
            </div>
          </div>
        </section>

        <!-- Four -->
        <section id="projects" class="wrapper alt style1">
          <div class="inner">
            <h2 class="major">Projects</h2>
            <p>
              Relevant projects I created or contributed to. You can check them
              out using the links provided for each.
            </p>
            <section class="features">
              <article>
                <a href="#" class="image"
                  ><img src="{{asset('portfolio/pic04.jpg')}}" alt=""
                /></a>
                <h3 class="major">Sed feugiat lorem</h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id
                  nulla dignissim dapibus ultrices.
                </p>
                <a href="#" class="special">Learn more</a>
              </article>
              <article>
                <a href="#" class="image"
                  ><img src="{{asset('portfolio/pic05.jpg')}}" alt=""
                /></a>
                <h3 class="major">Nisl placerat</h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id
                  nulla dignissim dapibus ultrices.
                </p>
                <a href="#" class="special">Learn more</a>
              </article>
              <article>
                <a href="#" class="image"
                  ><img src="{{asset('portfolio/pic06.jpg')}}" alt=""
                /></a>
                <h3 class="major">Ante fermentum</h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id
                  nulla dignissim dapibus ultrices.
                </p>
                <a href="#" class="special">Learn more</a>
              </article>
              <article>
                <a href="#" class="image"
                  ><img src="{{asset('portfolio/pic07.jpg')}}" alt=""
                /></a>
                <h3 class="major">Fusce consequat</h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing vehicula id
                  nulla dignissim dapibus ultrices.
                </p>
                <a href="#" class="special">Learn more</a>
              </article>
            </section>
          </div>
        </section>
      </section>

      <!-- Footer -->
      <section id="footer">
        <div id="contacts" class="inner">
          <h2 class="major">Get in touch</h2>
          <p>
            Use the form or the rest my contacts below to connect with me.
          </p>
          <form method="post" action="#">
            <div class="fields">
              <div class="field">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" />
              </div>
              <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" />
              </div>
              <div class="field">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="4"></textarea>
              </div>
            </div>
            <ul class="actions">
              <li><input type="submit" value="Send Message" /></li>
            </ul>
          </form>
          <ul class="contact">
            <li class="icon solid fa-home">
              Untitled Inc<br />
              1234 Somewhere Road Suite #2894<br />
              Nashville, TN 00000-0000
            </li>
            <li class="icon solid fa-phone">(000) 000-0000</li>
            <li class="icon solid fa-envelope">
              <a href="#">information@untitled.tld</a>
            </li>
            <li class="icon brands fa-twitter">
              <a href="#">twitter.com/untitled-tld</a>
            </li>
            <li class="icon brands fa-facebook-f">
              <a href="#">facebook.com/untitled-tld</a>
            </li>
            <li class="icon brands fa-instagram">
              <a href="#">instagram.com/untitled-tld</a>
            </li>
          </ul>
          <ul class="copyright">
            <li>&copy; Rustine Dave All rights reserved.</li>
          </ul>
        </div>
      </section>
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/pfolio_jquery.min.js')}}"></script>
    <script src="{{asset('js/pfolio_jquery.scrollex.min.js')}}"></script>
    <script src="{{asset('js/pfolio_browser.min.js')}}"></script>
    <script src="{{asset('js/pfolio_breakpoints.min.js')}}"></script>
    <script src="{{asset('js/pfolio_util.js')}}"></script>
    <script src="{{asset('js/pfolio_main.js')}}"></script>
  </body>
</html>
