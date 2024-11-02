<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Flex Invest</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://cdn.jsdelivr.net/npm/aos@next/dist/aos.css" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
      </head>
      
    <body class="antialiased">

        <header>
            <nav class="navbar navbar-expand-lg p-0">
              <div class="nav-wrap">
                <a class="navbar-brand" href="#" style="font-weight: bolder">
                    ChalanManagment
                </a>
                <button class="menu" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                  onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))">
                  <svg width="400" height="40" viewBox="0 0 100 100">
                    <path class="line line1"
                      d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                    <path class="line line2" d="M 20,50 H 80" />
                    <path class="line line3"
                      d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                  </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                    <div class="col d-flex justify-content-end">
                        <ul class="navbar-nav navbar-right-link">
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a href="{{ url('/dashboard') }}" class="button button-outline-primary button-round">Dashboard</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="button button-outline-primary button-round">Login</a>
                                    </li>
                                    <li class="nav-item" style="margin-right: 20px; margin-left: 20px">
                                        <a href="{{ route('register') }}" class="button button-primary button-round">Sign up</a>
                                    </li>
                                @endauth
                            @endif
                        </ul>
                  </div>
                </div>
        
        
              </div>
            </nav>
          </header>
          <section class="simple-section hero-section" data-aos="fade-up">
            <div class="container">
              <div class="hero-bg-right"></div>
              <div class="row">
                <div class="col-md-6">
                  <div class="hero-left">
                    <h1 data-aos="fade-right" data-aos-delay="200">
                        Streamline Your Chalans <br>
                        <span class="text-blue">With Us!</span>
                    </h1>
                    <p data-aos="fade-right" data-aos-delay="400">
                        Our Chalan Management System is designed to simplify the process of managing student payments and regulations. With our intuitive interface, you can easily create, track, and manage chalans, ensuring that every transaction is transparent and efficient. 
                    </p>
                    <p data-aos="fade-right" data-aos-delay="600">
                        Whether you are an educational institution or an administrative body, our software empowers you to maintain a seamless record of all payments, rules, and regulations, enhancing accountability and trust. 
                    </p>
                    <p data-aos="fade-right" data-aos-delay="800">
                        Join countless organizations that are optimizing their financial processes with our cutting-edge solution. From managing student fees to generating insightful reports, we have you covered at every step.
                    </p>
                    <a href="{{ route('login') }}" class="button button-primary button-round" data-aos="fade-right">Get Started Today!</a>

                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="hero-right">
                    <img src="assets/images/image 12.png" alt="" data-aos="fade-up">
                  </div>
                </div>
              </div>
            </div>
          </section>

        <script src=" https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
        </script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/aos@next/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>
        <link href="{{ asset('assets/js/script.js') }}" rel="stylesheet">
    </body>
</html>
