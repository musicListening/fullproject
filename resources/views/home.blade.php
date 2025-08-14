<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
         
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
       

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&amp;family=Playfair+Display:ital,wght@0,400..900;1,400..900&amp;display=swap" rel="stylesheet">

        <!-- Google Fonts (Local) -->
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <style>
        .navmenu ul li a {
        font-size: 1rem;
        font-family: 'Playfair Display', Arial, sans-serif;
        font-weight: 500;
        color: white;
        transition: color 0.3s;
      }

      .navmenu ul li a.active-section {
        color: gold !important;
      }

      </style>
      <style>
    .navmenu ul li a,
    .logout-link {
      font-size: 1rem;
      font-family: 'Playfair Display', Arial, sans-serif;
      font-weight: 500;
      color: white;
      background: none;
      border: none;
      padding: 0;
      cursor: pointer;
      transition: color 0.3s ease;
      text-decoration: none;
    }
    .navmenu ul li a:hover,
    .logout-link:hover {
      color: #FFD700;
    }
    .footer-logout {
      background: none;
      border: none;
      color: #fff;
      padding: 0;
      margin: 0;
      font-family: 'Playfair Display', Arial, sans-serif;
      font-weight: 500;
      cursor: pointer;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .footer-logout:hover {
      color: #FFD700;
    }
    </style>
    </head>
    <body>
        <header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container position-relative d-flex align-items-center justify-content-between">
    <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
      <h1 class="sitename">AquaLogix</h1>
    </a>
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ url('/') }}" class="active">Home</a></li>
        <li><a href="{{ url('/#about') }}">About</a></li>
        <li><a href="{{ url('/#services') }}">Services</a></li>
        <li><a href="{{ route('pricing') }}">Pricing</a></li>

        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endguest

        @auth
            <li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-link logout-link">Logout</button>
                </form>
            </li>
        @endauth
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>


  <section id="hero" class="hero-section d-flex align-items-center">
  <div class="overlay"></div>
  <div class="container position-relative">
    <div class="row">
      <div class="col-md-6">
        <h1 class="mb-4">The Number 01<br>
        Drinking water in Sri Lanka</h1>
        <p>
         Created entirely by nature & the best water in Sri Lanka. <br> 
         Bottled at the source with High Quality & Purity Guaranteed.
        </p>
        <a href="{{ route('pricing') }}" class="btn btn-light mt-4">Learn More</a>
      </div>
    </div>
  </div>
</section>

<section id="about" class="about-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Image -->
      <div class="col-md-6">
        <img src="{{ asset('img/about/about-image.webp') }}" alt="About AquaLogix" class="about-img img-fluid rounded shadow">
      </div>

      <!-- Right Content -->
      <div class="col-md-6">
        <div class="about-item">
          <h4 class="text-primary text-uppercase">About Us</h4>
          <h1 class="display-5 mb-3" style="font-family: 'Playfair Display', serif; color:#000070">We Deliver The Quality Water.</h1>
          <p class="mb-4">Location of our source of water in padukka, comes through a deep tube well 120 feet below the ground penetrating through 2 solid rock beds. This location has been identified as the best ground water source in Sri Lanka. The extracted water goes through an extensive 7 filtration stages, careful lab tests and quality checks before its bottled and delivered to your hands.</p>

          <!-- Feature Box 1 -->
          <div class="bg-light rounded p-4 mb-4">
            <div class="d-flex">
              <div class="me-4">
                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                  <i class="fas fa-tint text-white fa-2x"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-2">Satisfied Customer</h5>
                <p class="mb-0">At the heart of our mission is a simple promise: delivering crystal-clear, pure water that keeps our customers happy and refreshed every day.</p>
              </div>
            </div>
          </div>

          <!-- Feature Box 2 -->
          <div class="bg-light rounded p-4 mb-4">
            <div class="d-flex">
              <div class="me-4">
                <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                  <i class="fas fa-faucet text-white fa-2x"></i>
                </div>
              </div>
              <div>
                <h5 class="mb-2">Standard Product</h5>
                <p class="mb-0">We offer high-quality, standard products at a fair and affordable price, ensuring you get the best value without compromising on quality.</p>
              </div>
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container-fluid counter py-5" id="counter-section">
  <div class="container py-5">
    <div class="row g-5 text-white text-center">
      <!-- Happy Clients -->
      <div class="col-md-6 col-lg-3">
        <div class="counter-item">
          <div class="counter-item-icon mx-auto mb-3">
            <i class="fas fa-thumbs-up fa-3x text-white"></i>
          </div>
          <h2>Happy Clients</h2>
          <div class="counter-counting" data-target="456">
            <span class="counter-number">0</span>
            <span class="plus">+</span>
          </div>
        </div>
      </div>
      <!-- Transport -->
      <div class="col-md-6 col-lg-3">
        <div class="counter-item">
          <div class="counter-item-icon mx-auto mb-3">
            <i class="fas fa-truck fa-3x"></i>
          </div>
          <h2>Transport</h2>
          <div class="counter-counting" data-target="513">
            <span class="counter-number">0</span>
            <span class="plus">+</span>
          </div>
        </div>
      </div>
      <!-- Employees -->
      <div class="col-md-6 col-lg-3">
        <div class="counter-item">
          <div class="counter-item-icon mx-auto mb-3">
            <i class="fas fa-users fa-3x"></i>
          </div>
          <h2>Employees</h2>
          <div class="counter-counting" data-target="53">
            <span class="counter-number">0</span>
            <span class="plus">+</span>
          </div>
        </div>
      </div>
      <!-- Years of Experience -->
      <div class="col-md-6 col-lg-3">
        <div class="counter-item">
          <div class="counter-item-icon mx-auto mb-3">
            <i class="fas fa-heart fa-3x"></i>
          </div>
          <h2>Years Experience</h2>
          <div class="counter-counting" data-target="21">
            <span class="counter-number">0</span>
            <span class="plus">+</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid service bg-light py-5" id="services" >
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-uppercase text-primary" style="font-family: 'Playfair Display', serif;font-weight:500;font-size:30px;">Our Service</h4>
                    <h1 class="display-3 text-capitalize mb-3" style="font-family: 'Playfair Display', serif;font-size:70px">Protect Your Family with Best Water</h1>
                </div>
                <div class="row gx-0 gy-4 align-items-center">
                    <div class="col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="service-item rounded p-4 mb-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="service-content text-end">
                                            <a href="#" class="h4 d-inline-block mb-3">Calcium</a>
                                            <p class="mb-0">AquaLogix is a delightfully refreshing, naturally pure mineral water that is abundant in essential calcium for optimal body functioning.</p>
                                        </div>
                                        <div class="ps-4">
                                            <div class="service-btn"><i class="fas fa-hand-holding-water text-white fa-2x"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="service-item rounded p-4 mb-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="service-content text-end">
                                            <a href="#" class="h4 d-inline-block mb-3">Chlorine</a>
                                            <p class="mb-0">We do not add any chlorine to Logix® Water. Nothing is extra is added. Our water is completely natural and untouched</p>
                                        </div>
                                        <div class="ps-4">
                                            <div class="service-btn"><i class="fas fa-dumpster-fire text-white fa-2x"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="service-item rounded p-4 mb-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="service-content text-end">
                                            <a href="#" class="h4 d-inline-block mb-3">Colour (Hazen Unit)</a>
                                            <p class="mb-0">Water is one of the safest & healthiest ways to hydrate. It contains no sugar or calories, and nothing is added to AquaLogix Water externally. It is completely natural and untouched as nature intended. The colour of the water remains as natural as it should be at the source.</p>
                                        </div>
                                        <div class="ps-4">
                                            <div class="service-btn"><i class="fas fa-filter text-white fa-2x"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-transparent">
                            <img src="{{ asset('img/water.png') }}" class="img-fluid w-100" alt="water-bottle">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="service-item rounded p-4 mb-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="pe-4">
                                            <div class="service-btn"><i class="fas fa-assistive-listening-systems text-white fa-2x"></i></div>
                                        </div>
                                        <div class="service-content">
                                            <a href="#" class="h4 d-inline-block mb-3">Water Illustration</a>
                                            <p class="mb-0">In order to maintain optimal health, our bodies require balance, and one crucial aspect we prioritize at AquaLogix Water is pH balance. We carefully monitor and ensure that you receive the finest quality water to support your well-being</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="service-item rounded p-4 mb-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="pe-4">
                                            <div class="service-btn"><i class="fas fa-recycle text-white fa-2x"></i></div>
                                        </div>
                                        <div class="service-content">
                                            <a href="#" class="h4 d-inline-block mb-3">Sodium</a>
                                            <p class="mb-0">At AquaLogix, we make sure to keep the mineral levels controlled best for your body keeping the body’s mineral balance, helping you feel great.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="service-item rounded p-4 mb-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="pe-4">
                                            <div class="service-btn"><i class="fas fa-project-diagram text-white fa-2x"></i></div>
                                        </div>
                                        <div class="service-content">
                                            <a href="#" class="h4 d-inline-block mb-3">Magnesium</a>
                                            <p class="mb-0">AquaLogix Water is rich in Magnesium supporting strong bones and steady blood pressure.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<footer class="bg-dark text-light pt-5 pb-3 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <h3 class="mb-2" style="color: #00aaff;">AquaLogix</h3>
        <p>The number one drinking water in Sri Lanka. Pure, natural, and bottled at the source for your health and refreshment.</p>
      </div>
      <div class="col-md-4 mb-4">
        <h5 class="mb-3 text-uppercase">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="{{ url('/') }}" class="text-light text-decoration-none">Home</a></li>
          <li><a href="{{ url('/#about') }}" class="text-light text-decoration-none">About</a></li>
          <li><a href="{{ url('/#services') }}" class="text-light text-decoration-none">Services</a></li>
          <li><a href="{{ route('pricing') }}" class="text-light text-decoration-none">Pricing</a></li>

          @guest
            <li><a href="{{ route('login') }}" class="text-light text-decoration-none">Login</a></li>
            <li><a href="{{ route('register') }}" class="text-light text-decoration-none">Register</a></li>
          @endguest

          @auth
            <li>
              <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="footer-logout">Logout</button>
              </form>
            </li>
          @endauth
        </ul>
      </div>
      <div class="col-md-4 mb-4">
        <h5 class="mb-3 text-uppercase">Contact Us</h5>
        <p><i class="fas fa-map-marker-alt me-2"></i>Padukka, Sri Lanka</p>
        <p><i class="fas fa-envelope me-2"></i>info@aqualogix.lk</p>
        <p><i class="fas fa-phone me-2"></i>+94 77 123 4567</p>
      </div>
    </div>
    <hr class="border-secondary">
    <div class="text-center">
      <small>&copy; {{ date('Y') }} AquaLogix. All rights reserved.</small>
    </div>
  </div>
</footer>


  <!-- Bootstrap JS (for dropdowns and responsive menu) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const navToggle = document.querySelector('.mobile-nav-toggle');
    const navMenu = document.querySelector('#navmenu ul');

    navToggle.addEventListener('click', function () {
      navMenu.classList.toggle('d-block');
    });
  });

  window.addEventListener("scroll", function () {
    const header = document.getElementById("header");
    if (window.scrollY > 50) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  });

  function animateCounter(element, target, duration) {
  let start = 0;
  const stepTime = 10; // ms
  const totalSteps = Math.ceil(duration / stepTime);
  const increment = target / totalSteps;

  const updateCount = () => {
    start += increment;
    if (start >= target) {
      element.textContent = target;
    } else {
      element.textContent = Math.floor(start);
      setTimeout(updateCount, stepTime);
    }
  };
  updateCount();
}

document.addEventListener('DOMContentLoaded', () => {
  const counters = document.querySelectorAll('.counter-counting');

  let hasAnimated = false;

  const observerOptions = {
    threshold: 0.5
  };

  const observerCallback = (entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !hasAnimated) {
        counters.forEach(counter => {
          const target = parseInt(counter.getAttribute('data-target'));
          const numberSpan = counter.querySelector('.counter-number');
          animateCounter(numberSpan, target, 1500);
        });
        hasAnimated = true;
      }
    });
  };

  const observer = new IntersectionObserver(observerCallback, observerOptions);
  const section = document.querySelector('#counter-section');
  if (section) {
    observer.observe(section);
  }
});
  document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll("#navmenu ul li a");

    function onScroll() {
    let scrollPos = window.scrollY + 150; 
    console.log(scrollPos); 
    sections.forEach((section) => {
        if (
            scrollPos >= section.offsetTop &&
            scrollPos < section.offsetTop + section.offsetHeight
        ) {
            navLinks.forEach((link) => {
                link.classList.remove("active");
                if (link.getAttribute("href") === `#${section.id}`) {
                    link.classList.add("active");
                }
            });
        }
    });
}

    window.addEventListener("scroll", onScroll);
  });

document.addEventListener('DOMContentLoaded', () => {
  const serviceItems = document.querySelectorAll('.service-item');

  const observerOptions = {
    threshold: 0.5
  };

  const observerCallback = (entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  };

  const observer = new IntersectionObserver(observerCallback, observerOptions);
  serviceItems.forEach(item => observer.observe(item));
});
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll('.navmenu ul li a');
    const aboutSection = document.querySelector('#about');

    window.addEventListener('scroll', function () {
      const fromTop = window.scrollY + 100;

      if (aboutSection.offsetTop <= fromTop && (aboutSection.offsetTop + aboutSection.offsetHeight) > fromTop) {
        links.forEach(link => {
          if (link.getAttribute('href').includes('#about')) {
            link.classList.add('active-section');
          } else {
            link.classList.remove('active-section');
          }
        });
      } else {
        links.forEach(link => {
          if (link.getAttribute('href').includes('#about')) {
            link.classList.remove('active-section');
          }
        });
      }
    });
  });

</script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script>
  new WOW().init();
</script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>