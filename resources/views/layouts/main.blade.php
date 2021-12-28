<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/6afb813a01.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="/assets/lib/bootstrap-5.1.3/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/lib/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/slick/slick-theme.css"/>
    <link href="/assets/css/style.css" type="text/css" rel="stylesheet">
    <link href="/assets/css/slick-style.css" type="text/css" rel="stylesheet">
    
    <title>@yield('title')</title>
  </head>
  <body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-blue">
      <div class="container">
          <a class="navbar-brand" href="/"><img src="/assets/img/logo-white.png" alt="" width="30" height="24" class="me-2 d-inline-block align-text-top">
            Homeseek</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav justify-content-end flex-grow-1">
            <li class="nav-item">
            <a class="nav-link {{request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{request()->is('beli') ? 'active' : '' }}" href="/beli">Beli</a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{request()->is('sewa') ? 'active' : '' }}" href="/sewa">Sewa</a>
            </li>
          </ul>
          </div>
      </div>
    </nav>
    @yield('content')

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    <script type="text/javascript" src="/assets/lib/slick/slick.min.js"></script>
    <script src="/assets/lib/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
    <script>
      $('.listing-carousel').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          
        ]
      });
    </script>
  </body>
</html>