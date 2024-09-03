<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ChainCity - Home</title>
  <link rel="shortcut icon" type="text/css" href="{{asset('asset/img/chaincitylogo.jpg')}}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/css-table-19/css/style.css">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="vendor/fontawesome/all.min.css">

  <!-- Datatables CSS -->
  <link rel="stylesheet" href="vendor/datatables/css/jquery.dataTables.min.css">

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
    <header class="header1 header-index">
      <div class="overlay">
        <nav class="navbar navbar-expand-lg">
          <div class="container cosynav">
            <a class="navbar-brand" href=""><img src="asset/img/logo-white.png" class="img-fluid" id="log"
                alt="logo">
              </a>
            
            <!-- Nav Item -->
            <ul class="navbar-nav ma-auto  nav-sm">
              <!-- Logo on small screen -->
              <div class="sm-logo-ctn d-lg-none ">
                <img src="asset/img/logo.png" class="img-fluid mb-2" alt="">
              </div>
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
        <div class="container">
          <div class="home-banner">

            <h1 class="title">Discover the perfect place to call home</h1>
            <p class="support-title mb-5">Start your journey with just a few easy and fast clicks</p>
            <form class="w-100" action="{{route('searchlisting')}}" method="post">
              @csrf
              <div class="row justify-content-center ltn-srh w-100">
                <div class="col-md-3 col-sm-4 ctn ctn-start">
                  <div class="w-100" style="overflow:hidden;text-overflow: ellipsis;">
                    <label>Locations</label>
                    <br>
                    <select name="location">
                      <option>Select your city</option>
                      @foreach($city as $cities)
                      <option style="text-overflow: ellipsis;">{{$cities->property_city}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

              <div class="col-md-3 col-sm-4  ctn">
                  <div class="border-start-end">
                    <label>Type</label>
                    <br>
                    <select name="property_type">
                        <option>Select property type</option>
                        @foreach($type as $types)
                          <option style="text-overflow: ellipsis;">{{$types->property_type}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-4 ctn ctn-end">
                  <div>
                    <label>Price Range</label>
                    <br>
                    <select name="pricerange">
                      <option>Select rent range</option>
                      <option value="73">$0 - $73</option>
                      <option value="173">$75 - $173</option>
                      <option value="773">$200 - $773</option>
                    </select>
                  </div>
                </div>

              <div class="col-md-3 col-sm-12 d-flex ctn ctn-end end">
                <button class="rlf-btn rlf-btn-primary"><img src="asset/img/icon-search-white.png" class="srh-img"
                    width="20px" alt=""></i> <span class="srh-text">Search</span></button>
              </div>
            </div>
           </form>
          </div>
        </div>
      </div>
    </header>

    <main>
      <div class="container">
        <section class="analy">
          <div class="row">
            <div class="col-lg-7 col-md-6 order-2 order-md-1">
              <div class="analy-ctn">
                <h3 class="h-title mb-4">Begin your search for your perfect home</h3>
                <p class="h-pg mb-4">We are pleased to offer house listing services and provide various options and
                  package to assist you in finding your dream home.</p><br>
                <div class="row">
                  <div class="col-md-10 col-lg-9">
                    <div class="row">
                      <div class="col-6 mb-3">
                        <h3 class="sub-title text-primary">20K+</h3>
                        <p class="analy-p">Happy customer <br> with our service</p>
                      </div>
                      <div class="col-6 mb-3">
                        <h3 class="sub-title text-primary">225K+</h3>
                        <p class="analy-p">The best property <br> we provide</p>
                      </div>
                      <div class="col-6 mb-3">
                        <h3 class="sub-title text-primary">316K+</h3>
                        <p class="analy-p">Companies affiliated <br> with us</p>
                      </div>
                      <div class="col-6 mb-3">
                        <h3 class="sub-title text-primary">413K+</h3>
                        <p class="analy-p">Properties completed</p>
                      </div>
                    </div>
                  </div>
                </div>
                <button class="rlf-btn-sm rlf-btn-primary seem-btn">See more <i class="fa fa-arrow-right"></i></button>
              </div>
            </div>
            <div class="col-lg-5 col-md-6 p-relative order-1 order-md-2">
              <img src="asset/img/introbuilding.png" class="img-fluid" alt="">
              <img src="asset/img/introbuilding2.png" class="support-img" alt="">
            </div>
          </div>
        </section>

        <section class="pop-rd">
          <div class="d-flex align-items-start justify-content-between">
            <h3 class="title">Popular Residents</h3>
            <a href="/property" class="text-dark">See all &nbsp;<i class="fa fa-arrow-right"></i></a>
          </div>
          <div class="row mt-5">

            <!--listing of property-->
            @foreach ($data as $item)
              <div class="col-lg-4 col-md-6 mb-5">
                <a href="/addreservation/{{base64_encode($item->id)}}" class="text-dark">
                <div class="pop-card">
                  <div class="img">
                    <img src="{{$item->property_photos[0]}}" alt="">
                  </div>
                  <h4 class="pop-card-title">{{$item->property_title}}</h4>
                  <div class="d-flex align-items-center justify-content-between">
                    <h5 class="pop-card-add"><img src="asset/img/Location.png" width="15px" alt="">&nbsp;
                       {{$item->property_location['label']}}
                    </h5>
                    <span class="pop-card-rt d-flex">
                      <i class="fas fa-star mt-1"></i>
                      @php($total = 0)
                      @foreach($item->Rating as $rating)
                        @php($total += $rating->rating) 
                      @endforeach
                      @if($total>0)
                        {{$total/count($item->rating)}}
                      @endif
                    </span>
                  </div>
                </div>
              </a>
              </div>
            @endforeach
          <!--listing-->
        </div>
      </section>

        <section class="ttmn">
          <div class="d-flex align-items-start justify-content-between mb-5">
            <h3 class="title">Our Testimonials</h3>
            <a href="javascript:;" class="text-dark">See all <i class="fa fa-arrow-right"></i></a>
          </div>
          <div class="row">
            @foreach ($reviews as $item)
              <div class="col-md-6 mb-4">
                <div class="rvw_cd_ctn">
                  <div class="rvw_header">
                    <div class="header-prl">
                      <div class="img">
                        <img src="{{$item->user->profile_photo}}" class="" alt="">
                      </div>
                      <div>
                        <h5 class="rvw_nm"><b>{{$item->user->first_name}}&nbsp;{{$item->user->last_name}}</b></h5>
                        <small class="d-none">Marketing Coordinator</small>
                      </div>
                    </div>
                    <div>
                      <i class="fa fa-star"></i> {{$item->rating}}
                    </div>
                  </div>
                  <div class="rvw_content">
                    <h5 class="d-none">Great Work!</h5>
                    <p>"{{$item->rating_message}}"</p>
                  </div>
                </div>
              </div>
            @endforeach  
          </div>
        </section>
      </div>

        <section class="nwt">
          <div class="nwt-ctn">
            <form action="/subscribe" method="POST" class="overlay" autocomplete="off">
              @csrf
            <div class="d-flex flex-column align-items-center justify-content-center">
              <h1>Get our special prices & our latest info</h1>
               <div class="input-group">
                  <input type="text" name="email" placeholder="Enter your email" class="form-control" required>
                  <div class="input-group-append">
                    <button type="submit" class="input-group-text rlf-btn-primary">Subscribe</button>
                  </div>
                </div>
            </div>
          </form>
          </div>
        </section>

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