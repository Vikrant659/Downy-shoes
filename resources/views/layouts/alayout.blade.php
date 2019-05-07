<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/minton/green-dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Oct 2018 18:06:05 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico') }}">

        <title>Minton - Responsive Admin Dashboard Template</title>
        <link rel="stylesheet" href="{{asset('backend/plugins/morris/morris.css') }}">
        <link href="{{asset('backend/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
        <link href="{{asset('backend/plugins/jquery-circliful/css/jquery.circliful.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <!-- Plugins  -->
        <script src="{{asset('backend/assets/js/jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="{{asset('backend/assets/js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
        <script src="{{asset('backend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{asset('backend/assets/js/detect.js') }}"></script>
        <script src="{{asset('backend/assets/js/fastclick.js') }}"></script>
        <script src="{{asset('backend/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{asset('backend/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{asset('backend/assets/js/waves.js') }}"></script>
        <script src="{{asset('backend/assets/js/wow.min.js') }}"></script>
        <script src="{{asset('backend/assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{asset('backend/assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{asset('backend/plugins/switchery/switchery.min.js') }}"></script>

        <!-- Counter Up  -->
        <script src="{{asset('backend/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{asset('backend/plugins/counterup/jquery.counterup.min.js') }}"></script>

        <!-- circliful Chart -->
        <script src="{{asset('backend/plugins/jquery-circliful/js/jquery.circliful.min.js') }}"></script>
        <script src="{{asset('backend/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- skycons -->
        <script src="{{asset('backend/plugins/skyicons/skycons.min.js') }}" type="text/javascript"></script>

        <!-- Page js  -->
        <script src="{{asset('backend/assets/pages/jquery.dashboard.js') }}"></script>

       
        
        
    </head>


    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="/index" class="logo"><i class="mdi mdi-radar"></i> <span>Minton</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

                        <li class="list-inline-item notification-list hide-phone">
                            <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-crop-free noti-icon"></i>
                            </a>
                        </li>

                

                       

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout"></i> <span>Logout</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a> 

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->
            @if(Session::has('success'))
        <div class="row">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
        </div>
    @endif

            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="{{route('home1')}}" class="waves-effect waves-primary">
                                    <i class="ti-home"></i><span> Dashboard </span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary">
                                    <i class="ti-shine"></i><span>Category Management</span> 
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/admin/viewcategory') }}">View categories</a></li>
                                    <li><a href="{{ url('/admin/addcategory') }}">Add categories</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary">
                                    <i class="ti-shine"></i><span>Product Management</span> 
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/admin/viewproduct') }}">All products</a></li>
                                    <li><a href="{{ url('/admin/addproduct') }}">Add products</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary">
                                    <i class="ti-shine"></i><span>Order Managment</span> 
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/admin/showorder') }}">All Order</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary">
                                    <i class="ti-shine"></i><span>User Management </span> 
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/admin/user') }}">All Users</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->


            @yield('content')

    </div>
    <!-- END wrapper -->



    <script>
        var resizefunc = [];
    </script>

     <!-- Custom main Js -->
     <script src="{{asset('backend/assets/js/jquery.core.js') }}"></script>
        <script src="{{asset('backend/assets/js/jquery.app.js') }}"></script>
        <script src="{{asset('backend/assets/js/modernizr.min.js') }}"></script>


    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
            $('.circliful-chart').circliful();
        });

        // BEGIN SVG WEATHER ICON
        if (typeof Skycons !== 'undefined'){
            var icons = new Skycons(
                    {"color": "#3bafda"},
                    {"resizeClear": true}
                    ),
                    list  = [
                        "clear-day", "clear-night", "partly-cloudy-day",
                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                        "fog"
                    ],
                    i;

            for(i = list.length; i--; )
                icons.set(list[i], list[i]);
            icons.play();
        };

    </script>

</body>
</html>