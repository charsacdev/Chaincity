<div>
    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Dashboard</title>
    
        <!--asset-->
        <link rel="shortcut icon" type="text/css" href="{{asset('asset/img/chaincitylogo.jpg')}}">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/css-table-19/css/style.css')}}">
    
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('vendor/fontawesome/all.min.css')}}">
        <!-- Datatables CSS -->
        <link rel="stylesheet" href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}">
    
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="{{asset('vendor/swiper/swiper-bundle.min.css')}}">
    
        <!-- Lightgallery CSS -->
        <link rel="stylesheet" href="{{asset('vendor/lightgallery/css/lightgallery.min.css')}}">
    
    
        <!--Custom CSS-->
        <link rel="stylesheet" href="{{asset('css/plugin.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/chaincitydashboard.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin.css')}}">

        <script src="{{asset('vendor/jquery/jQuery3.6.1.min.js')}}"></script>
    @livewireStyles
</head>
<body>
    <div class="page-wrapper">
        <main>
            
             <!-- Button trigger modal -->
            <button type="button" class="welcomeBtn d-none" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered modal-sm" >
              <div class="modal-content" style="background: #fff!important;">
                <div class="modal-body text-center p-4">
                  <img src="{{asset('asset/img/icon-hand-wave.png')}}" width="70px" class="mb-3" alt="">
                  <h3 class="modal-h3">Welcome To</h3>
                  <h3 class="text-primary modal-h3">Chaincity</h3>
                  <br>
                  <small class="modal-small">You are about to experience a new dimension of Chaincity as an admin. Let's get you started</small>
                  <button type="button" class="rlf-btn rlf-btn-primary tb-btn w-100 mt-4" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
            <div class="container-fluid">
                <div class="row" style="position: relative;">
                    <div class="col-lg-3 adm-sidebar">
                        <div class="adm-sidebar-header">
                            <div class="adm-sidebar-close d-lg-none"><i class="fa fa-times"></i></div>
                            <div class="logo">
                                <img src="{{asset('asset/img/logo.png')}}" class="img-fluid mb-2" alt="">
                            </div>
                        </div>
                        <div class="adm-sidebar-content">
                            <ul class="adm-sidebar-links-nav">
                                <li class="adm-sidebar-link-item">
                                    <a href="/admin/dashboard" class="adm-sidebar-link active">
                                        <img src="{{asset('asset/img/icon-dashboard-active.png')}}" class="active" alt="">
                                        <img src="{{asset('asset/img/icon-dashboard-inactive.png')}}" class="in-active d-none"
                                            alt="">
                                        Dashboard
                                    </a>
                                </li>
                                <li class="adm-sidebar-link-item">
                                    <a href="/admin/listing" class="adm-sidebar-link">
                                        <img src="{{asset('asset/img/icon-listing-active.png')}}" class="active d-none" alt="">
                                        <img src="{{asset('asset/img/icon-listing.png')}}" class="in-active" alt="">
                                        Listing Management
                                    </a>
                                </li>
                                <li class="adm-sidebar-link-item">
                                    <a href="/admin/booking" class="adm-sidebar-link">
                                        <img src="{{asset('asset/img/icon-booking-active.png')}}" class="active d-none" alt="">
                                        <img src="{{asset('asset/img/icon-booking.png')}}" class="in-active" alt="">
                                        Booking Management
                                    </a>
                                </li>

                                <li class="adm-sidebar-link-item">
                                    <a href="/admin/users" class="adm-sidebar-link">
                                        <img src="{{asset('asset/img/icon-users-active.png')}}" class="active d-none" alt="">
                                        <img src="{{asset('asset/img/icon-users-inactive.png')}}" class="in-active" alt="">
                                        User Management
                                    </a>
                                </li>
                                <li class="adm-sidebar-link-item">
                                    <a href="/admin/payment" class="adm-sidebar-link">
                                        <img src="{{asset('asset/img/icon-payment-active.png')}}" class="active d-none" alt="">
                                        <img src="{{asset('asset/img/icon-payment.png')}}" class="in-active" alt="">
                                        Payment and Revenue
                                    </a>
                                </li>
                                <li class="adm-sidebar-link-item">
                                    <a href="/admin/payout" class="adm-sidebar-link">
                                        <img src="{{asset('asset/img/icon-payment-active.png')}}" class="active d-none" alt="">
                                        <img src="{{asset('asset/img/icon-payment.png')}}" class="in-active" alt="">
                                        Payout and Revenue
                                    </a>
                                </li>
                                <li class="adm-sidebar-link-item">
                                    <a href="/admin/reviews" class="adm-sidebar-link">
                                        <img src="{{asset('asset/img/icon-payment-active.png')}}" class="active d-none" alt="">
                                        <img src="{{asset('asset/img/icon-payment.png')}}" class="in-active" alt="">
                                        Reviews
                                    </a>
                                </li>
                                <li class="adm-sidebar-link-item">
                                    <a href="/admin/profile" class="adm-sidebar-link">
                                        <img src="{{asset('asset/img/icon-profile-active.png')}}" class="active d-none" alt="">
                                        <img src="{{asset('asset/img/icon-profile.png')}}" class="in-active" alt="">
                                        Profile
                                    </a>
                                </li>
                            </ul>
                            <div class="adm-sidebar-footer">
                                <a href="/admin/profile">
                                    <div class="d-flex align-items-center justify-content-start gap-3 mb-4">
                                        <div class="img">
                                            @if(auth()->guard('admin')->user()->profile_photo=='')
                                            <img src="{{asset('asset/img/Avatars.png')}}" class="img-fluid profile-img" style="width:50px !important;height:50px !important;border-radius:50%">
                                          @else
                                              <img src="{{auth()->guard('admin')->user()->profile_photo}}" class="img-fluid mb-2 profile-img" style="width:50px !important;height:50px !important;border-radius:50%">
                                          @endif
                                        </div>
                                        <div class="usr">
                                            <h4>{{Auth::guard('admin')->user()->first_name}}&nbsp;{{Auth::guard('admin')->user()->last_name}}</h4>
                                            <small>{{substr(Auth::guard('admin')->user()->email, 0, 1)}}***{{explode('@', Auth::guard('admin')->user()->email)[1]}}</small>
                                        </div>
                                    </div>
                                </a>
                                <div class="mb-5 pb-5">
                                    <a href="/admin/logout" class="adm-btn adm-btn-primary">Logout <img
                                            src="{{asset('asset/img/icon-logout.png')}}" alt=""></a>
                                </div>
                                <div>
                                    <img src="{{asset('asset/img/support-img-red.png')}}" class="img-fluid w-100" alt="">
                                </div>
                            </div>
                        </div>

                    </div>

                <!--Yield Content-->
                <div class="col-lg-9 adm-main">
                    <div class="adm-main-header border-bottom">
                        <!--Chaning Headers-->
                        @if(request()->segment(count(request()->segments()))==="dashboard")
                            <div class="dtl order-2 order-lg-1">
                                <h4>
                                    @php
                                        $currentTime = now()->format('H:i:s');
                                        $greeting = '';

                                        if ($currentTime >= '05:00:00' && $currentTime < '12:00:00') {
                                            $greeting = 'Good Morning';
                                        } elseif ($currentTime >= '12:00:00' && $currentTime < '18:00:00') {
                                            $greeting = 'Good Afternoon';
                                        } else {
                                            $greeting = 'Good Evening';
                                        }
                                        echo $greeting;
                                    @endphp
                                    , {{auth()->guard('admin')->user()->first_name}}</h4>
                                <small>Hello Boss, ready to generate massive sales today? Let's go!</small>
                            </div>
                        @elseif(request()->segment(count(request()->segments()))==="listing")
                            <div class="dtl order-2 order-lg-1">
                                <h4>Listing Management</h4>
                                <small>Here is a list of your listed properties</small>
                          </div>
                        @elseif(request()->segment(count(request()->segments()))==="booking")
                            <div class="dtl order-2 order-lg-1">
                                <h4>Booking Management</h4>
                                <small>Here are persons that have booked your listed property.</small>
                            </div>
                        @elseif(request()->segment(count(request()->segments()))==="users")
                            <div class="dtl order-2 order-lg-1">
                                <h4>User Management</h4>
                                <small>Manage all admins, customers and agents using ChainCity system.</small>
                            </div>
                        @elseif(request()->segment(count(request()->segments()))==="payment")
                            <div class="dtl order-2 order-lg-1">
                                <h4>Payment & Revenue</h4>
                                <small>Here are all your payout made to agents</small>
                            </div>
                        @elseif(request()->segment(count(request()->segments()))==="payout")
                            <div class="dtl order-2 order-lg-1">
                                <h4>Payout & Revenue</h4>
                                <small>Here are all your payout made to agents</small>
                            </div>
                        @elseif(request()->segment(count(request()->segments()))==="profile")
                            <div class="dtl order-2 order-lg-1">
                                <h4>Profile Management</h4>
                                <small>Manage your profile settings</small>
                            </div>
                        @elseif(request()->segment(count(request()->segments()))==="reviews")
                        <div class="dtl order-2 order-lg-1">
                            <h4>Review Management</h4>
                            <small>Manage reviews on the plaform</small>
                        </div>
                        @endif
                            <div class="order-1 order-lg-2 nty-ctn">
                                <img src="{{asset('asset/img/icon-menu-red.png')}}" class="d-lg-none adm-menu-btn" alt="">
                                <ul class="nty">
                                    <li style="position: relative;" class="dropdown">
                                        <img src="{{asset('asset/img/icon-bell.png')}}" alt="" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="nty-counter">{{count($selectNotification)}}</span>
                                        <ul class="dropdown-menu ntf_dpw p-3 drop-notify adm-notify">
                                            <li
                                                class="d-flex align-items-start justify-content-between border-bottom py-3">
                                                <h3 class="dsb-header-sm text-primary mb-0">Notifications</h3>
                                                {{-- <a href="javascript:;" class="text-dark">  Clear all </a> --}}
                                            </li>
                                        @foreach ($selectNotification as $item)
                                            <li class="nav_dpd_itm">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-start justify-content-start gap-2">
                                                        <div>
                                                            <h5 class="ntf_heading">
                                                            <strong>
                                                                {{$item->notification_type}}
                                                            </strong></h5>
                                                                <small class="ntf_stdt">
                                                                    {{$item->message}}
                                                                </small>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-end gap-3">
                                                        <p class="ntf_tme">{{$item->created_at->format('F j, Y, g:i a') }}</p>
                                                        <p class="adm-nty-unread"></p>
                                                    </div>
                                                </div>
                                            </li>
                                           @endforeach   
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/admin/profile">
                                            <div class="img">
                                              @if(auth()->guard('admin')->user()->profile_photo=='')
                                                 <img src="{{asset('asset/img/Avatars.png')}}" class="img-fluid profile-img" style="width:50px !important;height:50px !important;border-radius:50%">
                                              @else
                                                 <img src="{{auth()->guard('admin')->user()->profile_photo}}" class="img-fluid mb-2 profile-img" style="width:50px !important;height:50px !important;border-radius:50%">
                                              @endif
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @yield('content')
                     </div>
                        <div class="row">
                            <div class="col-12 mt-5 py-2 text-center border-top">
                                <span>Powered by <a href="https://tutapis.com" class="text-primary">Tutapis</a></span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

       




    <!-- JS FILES -->
    <script src="{{asset('vendor/popper/popper.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/fontawesome/all.min.js')}}"></script>
    <script src="{{asset('vendor/lightgallery/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-validate/jquery.validate.js')}}"></script>
    <script src="{{asset('vendor/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{asset('vendor/chart-js/chart.bundle.min.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
    <script src="{{asset('js/plugins_init.js')}}"></script>
   <script src="{{asset('js/mainjs-admin.js')}}"></script>

    <script>
        $(document).ready(function(){
            //$('.welcomeBtn').click();

            // var addBtn = '<div class="text-start mt-2"> ' +
            //                 '<a href="/agent/newlisting/getstarted" class="rlf-btn rlf-btn-primary cta-btn">Create Listing &nbsp; <i class="fa fa-plus"></i></a> ' +
            //              '</div>';

            //      $('.dataTables_info').before(addBtn);
            
        });
    </script>
@livewireScripts
</body>
</html>
  
</div>
