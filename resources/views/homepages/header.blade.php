<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChainCity - Home</title>
  <link rel="shortcut icon" type="text/css" href="{{asset('asset/img/chaincitylogo.jpg')}}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="vendor/fontawesome/all.min.css">

  <!-- Datatables CSS -->
  <link rel="stylesheet" href="vendor/datatables/css/jquery.dataTables.min.css">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">

  <!--Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/slidercssaccount.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
  <div class="page-wrapper">
    <header class="header1 header-index">
      <div class="overlay">
        <nav class="navbar navbar-expand-lg">
          <div class="container cosynav">
            <a class="navbar-brand" href=""><img src="asset/img/logo-white.png" class="img-fluid" id="log"
                alt="logo"></a>
            <!-- Search -->
           



            <!-- Nav Item -->
            <ul class="navbar-nav ma-auto  nav-sm">
              <!-- Logo on small screen -->
              <div class="sm-logo-ctn d-lg-none ">
                <img src="asset/img/logo.png" class="img-fluid mb-2" alt="">
              </div>
              <!-- <span class="close d-lg-none d-sm-block">&times;</span> -->
              <li class="nav-item">
                <a class="nav-link active" href="/">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/faq">Faq</a>
              </li>
              <li class="nav-item">
                <a class="nav-link getstarted-btn" href="/contact">Contact us</a>
              </li>
              <li class="nav-item nav-bg-ml">
                <a href="/login" class="nav-link auth-btn">
                  <img src="asset/img/icon-user-white.png" alt=""> Login
                </a>
              </li>
              <li class="nav-item">
                <a href="/register" class="nav-link auth-btn">
                  <img src="asset/img/icon-user-plus.png" alt=""> Register
                </a>
              </li>
            </ul>

            <!-- Harmburger menu icon -->
            <div class="menu-btn d-lg-none d-sm-block">
              <div class="menu-btn-burger"></div>
            </div>
          </div>
        </nav>
      </div>
    </header>

      <!--yield-->
      @yield('content-intro')

    <!--footer--->
    <footer class="mt-5 pt-5">
      <div class="container">
        <div class="row justify-content-center flex-wrap footer">
          <div class="col-md-12 mt-3">
            <div class="col-12 text-center mb-3">
              <a href="javascript:;">
                <img src="asset/img/logo.png">
              </a>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center">
              <ul class="links footer-links justify-content-center">
                <li><a href="/" class="active"> Home</a></li>
                <li><a href="/about"> About</a></li>
                <li><a href="/faq"> FAQ</a></li>
                <li><a href="/contact"> Contact us</a></li>
              </ul>
            </div>
           
          </div>
         
          <hr>
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4 col-lg-4">
                <ul class="socials">
                  <li><a href="javascript:;"><i class="fab fa-facebook"></i></a></li>
                  <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="javascript:;"><i class="fab fa-linkedin"></i></a></li>
                </ul>
              </div>
              <div class="d-none d-lg-block col-lg-4"></div>
              <div class="col-sm-8 col-12 col-lg-4 text-end text-fl-center">
                <a href="/terms" class="text-decoration-none text-muted me-2">Terms of service</a>
                <a href="/privacy" class="text-decoration-none text-muted me-2">Privacy policy</a>
              </div>
            </div>
            <div class="row">
              
              <div class="col-sm-12 text-center pb-3 sub-footer mt-5">
                ChainCity &copy; <span id="year"></span>.
                Powered by <a href="https://tutapis.com" class="tutapis">Tutapis</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>


  <!-- JS FILES -->
  <script src="vendor/jquery/jQuery3.6.1.min.js"></script>
  <script src="vendor/popper/popper.js"></script>
  <script src="vendor/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="vendor/fontawesome/all.min.js"></script>
  <script src="vendor/jquery-validate/jquery.validate.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
  <script src="asset/js/plugins_init.js"></script>
  <script src="asset/js/main.js"></script>
  <script>
    $(document).ready(function(){
      $('.seem-btn').on('click', function(){
          location.href = 'properties.html';
      })
    })
  </script>
</body>

</html>