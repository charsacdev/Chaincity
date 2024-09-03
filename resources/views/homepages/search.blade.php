<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChainCity - Search</title>
  <link rel="shortcut icon" type="text/css" href="{{asset('asset/img/chaincitylogo.jpg')}}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/css-table-19/css/style.css">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{asset('vendor/fontawesome/all.min.css')}}">
  <!-- Datatables CSS -->
  <link rel="stylesheet" href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}">

  <!-- Bootstrap daterangepicker -->
  <link rel="stylesheet" href="{{asset('vendor/bootstrap-daterangepicker/daterangepicker.css')}}">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="{{asset('vendor/swiper/swiper-bundle.min.css')}}">

  <!-- Lightgallery CSS -->
  <link rel="stylesheet" href="{{asset('vendor/lightgallery/css/lightgallery.min.css')}}">


  <!--Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/slidercssaccount.css')}}">
  <link rel="stylesheet" href="{{asset('css/plugin.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <!--JQUERY-->
   <script src="{{asset('vendor/jquery/jQuery3.6.1.min.js')}}"></script>
</head>

<body>
  <div class="page-wrapper">
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container cosynav">
              <a class="navbar-brand" href=""><img src="asset/img/logo.png" class="img-fluid" id="log"
                  alt="logo"></a>
             
              <!-- Nav Item -->
              <ul class="navbar-nav ma-auto  nav-sm">
                <!-- Logo on small screen -->
                <div class="sm-logo-ctn d-lg-none ">
                  <img src="asset/img/logo.png" class="img-fluid mb-2" alt="">
                </div>
                <!-- <span class="close d-lg-none d-sm-block">&times;</span> -->
                <li class="nav-item">
                  <a class="nav-link" href="/">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="/about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="/faq">Faq</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/contact">Contact us</a>
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
    </header>
        
     
    <main>
        <!--poplular searches--->
        <div class="container poplular-search mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="dsb-header">Popular Resident</h1>
                <div>
                    <a href="javascript:;" class="text-dark"> See all <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="row">
                @foreach($data as $asset)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-5">
                    <div class="psr_ctn">
                        <div class="wishlist_icon">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="lightgallery">
                            @foreach($asset->property_photos as $photos)
                            <a href="{{$photos}}" data-sub-html="What the apartment look like"
                                data-exthumbimage="{{$photos}}"
                                data-src="{{$photos}}">
                                <div class="lg__btn"><i class="fa fa-eye"></i></div>
                            </a>
                            @break
                            @endforeach
                        </div>
                        <div class="swiper popularSearchSwiper">
                            <div class="swiper-wrapper">
                                @foreach($asset->property_photos as $photos)
                                <div class="swiper-slide">
                                    <a href="/addreservation/{{base64_encode($asset->id)}}">
                                        <div class="img" style="background-image: url('{{$photos}}');"></div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="hse_desc">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4><a href="/addreservation/{{base64_encode($asset->id)}}" class="text-dark">{{$asset->property_title}}</a></h4>
                                <span class=""><i class="fas fa-star"></i> 4.96</span>
                            </div>
                            <p class="text-muted">{{$asset->property_city}}</p>
                            <h6>${{number_format($asset->property_price)}} &nbsp; 1sqm</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    
        <!--session success-->
      @if(session('mailchimp'))
      <script type="text/javascript">
        $(document).ready(function() {
          swal({
                title: 'Thank your for joining our news letter!',
                imageUrl: '../asset/img/verify.png',
                animation: true,
                showConfirmButton: false,
                timer: 5000
              })
        });
      </script>
      @endif
</main>

<!--footer--->
<footer class="mt-5 pt-5">
<div class="container">
 <div class="row justify-content-center flex-wrap footer">
   <div class="col-md-7 mt-3">
     <div class="col-12 text-start mb-3">
       <a href="javascript:;">
         <img src="asset/img/logo.png">
       </a>
     </div>
     <ul class="links footer-links">
       <li><a href="/"> Home</a></li>
       <li><a href="/about" class="active"> About</a></li>
       <li><a href="/faq"> FAQ</a></li>
       <li><a href="/contact"> Contact us</a></li>
     </ul>
   </div>
   <div class="col-md-5">
     <div class="mb-3">
       <small>Receive the most recent news and updates directly in your email inbox!</small>
     </div>
     <form action="/subscribe" method="POST">
       @csrf
       <div class="form-group footer-newsletter">
         <div class="input-group">
           <input type="text" name="email" placeholder="Enter Email" class="form-control" required>
           <div class="input-group-append">
             <button class="input-group-text">Subscribe</button>
           </div>
         </div>
       </div>
     </form>
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
       <hr>
       <div class="col-sm-12 text-center pb-3 sub-footer">
         ChainCity &copy; <span id="year"></span>.
         Powered by <a href="https://tutapis.com" target="_blank" class="tutapis">Tutapis</a>
       </div>
     </div>
   </div>
 </div>
</div>
</footer>

</div>


<!-- JS FILES -->
<script src="vendor/popper/popper.js"></script>
<script src="vendor/bootstrap/bootstrap.bundle.min.js"></script>
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/fontawesome/all.min.js"></script>
<script src="vendor/jquery-validate/jquery.validate.js"></script>
<script src="vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('vendor/sweet-alert/sweetalert.min.js')}}"></script>
<script src="js/plugins_init.js"></script>
<script src="js/main.js"></script>
<script>
$(document).ready(function(){
$('.seem-btn').on('click', function(){
  //location.href = 'properties.html';
})
})
</script>
</body>

</html>