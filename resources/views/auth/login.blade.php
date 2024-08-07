
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4">

    <!-- Title -->
    <title> winners </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('front-end/images/logo.png') }}" type="image/x-icon">

    <!-- Icons css -->
    <link href="{{ asset('dashboard/css/icons.css" rel="stylesheet') }}">

    <!-- Bootstrap css -->
    <link id="style" href="{{ asset('dashboard/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- style css -->
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/plugins.css') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ asset('dashboard/css/animate.css') }}" rel="stylesheet">

</head>

<body class="ltr error-page1 main-body bg-light text-dark error-3 login-img">


    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('dashboard/img/svgicons/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{ asset('icon-new/1.gif') }}"
                                class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                    <div class="card-sigin">
                                        <div class="mb-5 d-flex">
                                            <a href="#"><img
                                                    src="{{ asset('front-end/images/logo.png') }}"
                                                    class="sign-favicon-a ht-40" alt="logo">
                                                <img src="{{ asset('icon/logo4.png') }}"
                                                    class="sign-favicon-b ht-40" alt="logo">
                                            </a>
{{--                                            <h1 class="main-logo1 ms-1 me-0 my-auto tx-28">Naddom</h1>--}}
                                        </div>
                                        <div class="card-sigin">
                                            <div class="main-signup-header">
                                                <h2>Welcome back!</h2>
                                                <h5 class="fw-semibold mb-4">Please sign in to continue.</h5>
                                                <form method="POST" action="{{ route('Admin.login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input name="email"
                                                            class="form-control  @error('email') is-invalid @enderror"
                                                            placeholder="Enter your email" type="text"
                                                            value="{{ old('email') }}">
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input name="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="Enter your password" type="password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="remember" id="remember"
                                                                    {{ old('remember') ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="remember">
                                                                    {{ __('Remember Me') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->
                    </div>
                </div><!-- End -->
            </div>
        </div>

    </div>
    <!-- End Page -->

    <!-- JQuery min js -->
    <script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Bundle js -->
    <script src="{{ asset('dashboard/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('dashboard/plugins/moment/moment.js') }}"></script>

    <!-- P-scroll js -->
    <script src="{{ asset('dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- eva-icons js -->
    <script src="{{ asset('dashboard/js/eva-icons.min.js') }}"></script>

    <!--themecolor js-->
    <script src="{{ asset('dashboard/js/themecolor.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('dashboard/js/custom.js') }}"></script>

    <!-- switcher-styles js -->
    <script src="{{ asset('dashboard/js/swither-styles.js') }}"></script>

</body>

</html>
