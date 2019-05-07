<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/minton/green-dark/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Oct 2018 18:08:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico') }}">

        <title>Minton - Responsive Admin Dashboard Template</title>

        <link href="{{asset('backend/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />

        <link href="{{asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css">

        <script src="{{asset('backend/assets/js/modernizr.min.js') }}"></script>

    </head>
    <body>

        <div class="wrapper-page">

            <div class="text-center">
                <a class="logo-lg"><i class="mdi mdi-radar"></i> <span>Minton</span> </a>
            </div>

            <form class="form-horizontal m-t-20" method = "POST" action  = "{{action('AdminController@signin')}}">
            @csrf
                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                            </div>
                            <input class="form-control" type="email" required="" placeholder="Username" name = "email">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="mdi mdi-radar"></i></span>
                            </div>
                            <input class="form-control" type="password" required="" placeholder="Password" name = "password">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>
                        <div class="form-group text-right m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-custom w-md waves-effect waves-light" type="submit">Log In
                        </button>
                    </div>
                </div>
                    </div>
                </div>
            </form>
        </div>


        <script>
            var resizefunc = [];
        </script>

        <!-- Plugins  -->
        <script src="{{asset('backend/assets/js/jquery.min.js') }}"></script>
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

        <!-- Custom main Js -->
        <script src="{{asset('backend/assets/js/jquery.core.js') }}"></script>
        <script src="{{asset('backend/assets/js/jquery.app.js') }}"></script>
	
	</body>

<!-- Mirrored from coderthemes.com/minton/green-dark/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Oct 2018 18:08:43 GMT -->
</html>