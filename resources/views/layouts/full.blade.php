<!DOCTYPE html>
<html lang="en">

<head>
	<title>Downy Shoes an Ecommerce Category Bootstrap Responsive Website Template | About :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Downy Shoes Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script src="{{ asset('js/app.js') }}"></script>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
	<!-- //custom-theme -->
	<link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}" type="text/css" media="screen" property="" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/contact.css') }}">
    <link href="{{ asset('frontend/css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('frontend/css/flexslider.css') }}" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/jquery-ui1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/checkout.css') }}"><link rel="stylesheet" href="{{ asset('frontend/css/shop.css') }}" type="text/css" media="screen" property="" />
	<link href="{{ asset('frontend/css/style7.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="{{ asset('frontend/css/font-awesome.css') }}" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<script type="text/javascript" src="{{ asset('frontend/js/jquery-2.1.4.min.js') }}"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<!-- //favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon-16x16.png') }}">

</head>

<body>
	<!-- banner -->
    <div class="banner_top innerpage" id="home">
    <div class="wrapper_top_w3layouts">
        <div class="header_agileits">
            <div class="logo inner_page_log">
                <h1><a class="navbar-brand" href="/"><span>Downy</span> <i>Shoes</i></a></h1>
            </div>
            <div class="overlay overlay-contentpush">
                <button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

                <nav>
                    <ul>
						<li><a href="/" class="active">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/shop">Shop Now</a></li>
						<li><a href="/contact">Contact</a></li>
						<!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Product<span class="caret"></span>
                        </a> -->
						<li class="nav-item dropdown">
							<a id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								Category<span class="caret"></span>
							</a>
							<div style = "top: -12px; text-align: center;padding: 0px 0px 0px 0px" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								@foreach(App\Category::all() as $cat)
									<a class="dropdown-item"  href="{{ url('/list/'.$cat->id)}}">{{ ucfirst($cat->category) }}</a>
								@endforeach
							</div>
						</li> 
						@guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
							
                                <div style = "top: -12px; text-align: center;padding: 0px 0px 0px 0px" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ url('/edit/'.@Auth::user()->id) }}"
                                       >
                                        {{ __('Edit Profile') }}
                                    </a>
									<a class="dropdown-item" href="{{ url('/order/'.@Auth::user()->id) }}"
                                       >
                                        {{ __('My Orders') }}
                                    </a>
								<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
									</form>
									</li>
							
                        @endguest
						        </div>
							
                    </ul>
                </nav>
            </div>
            <div class="mobile-nav-button">
                <button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
            <!-- cart details -->
            <div class="top_nav_right">
			<a href = "{{route('cart')}}">
                <div class="shoecart shoecart2 cart cart box_1">
                        <button class="top_shoe_cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
						<span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                </div>
				</a>
            </div>
		</div>
		<div class="search_w3ls_agileinfo">
					<div class="cd-main-header">
						<ul class="cd-header-buttons">
							<li><a style="position:relative;right: 77px;top: 1px;" class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
						</ul>
					</div>
					<div id="cd-search" class="cd-search">
						<form action="{{route('store')}}" method="get">
							<input name="Search" type="search" placeholder="Click enter after typing..." style="width: 25%;position: relative;left: 733px;">
						</form>
					</div>
				</div>
            @yield('header')
        </div>
    </div>
	
    @yield('content')
	
    <!-- footer -->

  
		<div class="clearfix"></div>
	</div>
    <div class="footer_agileinfo_w3">
		<div class="footer_inner_info_w3ls_agileits">
			<div class="col-md-3 footer-left">
				<h2><a href="/"><span>D</span>owny Shoes </a></h2>
				<p>Lorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
				<ul class="social-nav model-3d-0 footer-social social two">
					<li>
						<a href="#" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						</a>
					</li>
				</ul>
			</div>
			
			<div class="col-md-9 footer-right">
				<div class="sign-grds">
					<div class="col-md-4 sign-gd">
						<h4>Our <span>Information</span> </h4>
						<ul>
							<li><a href="/">Home</a></li>
							<li><a href="/about">About</a></li>
							<li><a href="/contact">Contact</a></li>
						</ul>
					</div>

					<div class="col-md-5 sign-gd-two">
						<h4>Store <span>Information</span></h4>
						<div class="address">
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Phone Number</h6>
									<p>+91-9998887771</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Email Address</h6>
									<p>Email :<a href="mailto:vikrantrana@smartdatainc.net"> vikrantrana@gmail.com</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="address-grid">
								<div class="address-left">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="address-right">
									<h6>Location</h6>
									<p>Broome St, NY 10002,California, USA.

									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<div class="col-md-3 sign-gd flickr-post">
						<h4>Flickr <span>Posts</span></h4>
						<ul>
							<li><a href="/single"><img src="{{ asset('frontend/images/t1.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="/single"><img src="{{ asset('frontend/images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="/single"><img src="{{ asset('frontend/images/t3.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="/single"><img src="{{ asset('frontend/images/t4.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="/single"><img src="{{ asset('frontend/images/t1.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="/single"><img src="{{ asset('frontend/images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="/single"><img src="{{ asset('frontend/images/t3.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="/single"><img src="{{ asset('frontend/images/t2.jpg') }}" alt=" " class="img-responsive" /></a></li>
							<li><a href="/single"><img src="{{ asset('frontend/images/t4.jpg') }}" alt=" " class="img-responsive" /></a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>

			<p class="copy-right-w3ls-agileits">&copy 2018 Downy Shoes. All rights reserved | Design by <a href="http://w3layouts.com/">w3layouts</a></p>
		</div>
	</div>
	</div>
	<!-- //footer -->
    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	
	<!-- //js -->
	<!-- cart-js -->
	
		
	</script>
	<!-- //cart-js -->
	<!-- /nav -->
	<script src="{{ asset('frontend/js/modernizr-2.6.2.min.js') }}"></script>
	<script src="{{ asset('frontend/js/classie.js') }}"></script>
	<script src="{{ asset('frontend/js/demo1.js') }}"></script>
	<!-- //nav -->
	<!--search-bar-->
    
    <script src="{{ asset('frontend/js/imagezoom.js') }}"></script>
	<!-- single -->
	<!-- script for responsive tabs -->
	<script src="{{ asset('frontend/js/easy-responsive-tabs.js') }}"></script>
	<!--//search-bar-->
	<!--quantity-->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="{{ asset('frontend/js/move-top.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/easing.js') }}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->
	<script type="text/javascript" src="{{ asset('frontend/js/bootstrap-3.1.1.min.js') }}"></script>
    <script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!-- FlexSlider -->
	<script src="{{ asset('frontend/js/jquery.flexslider.js') }}"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!--search-bar-->
	<script src="{{ asset('frontend/js/search.js') }}"></script>
	<!--//search-bar-->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="{{ asset('frontend/js/move-top.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/easing.js') }}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->
	<script type="text/javascript" src="{{ asset('frontend/js/bootstrap-3.1.1.min.js') }}"></script>

</body>

</html>