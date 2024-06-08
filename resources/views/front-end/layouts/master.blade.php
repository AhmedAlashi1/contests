
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> @yield('title', env('APP_NAME')) </title>
    @include('front-end.layouts.css')
    @stack('styles')
</head>
<body>
<div class="preloader">
    <div class="progress">
        <div class="progress-bar"></div>
    </div>
</div>
<!-- preloader -->
<header class="upper-head">
    <a href="{{url('/')}}" class="logo-ancor">
        <figure class="logo-img">
            <img src="{{asset('front-end/images/logo.png')}}" alt="logo" class="img-fluid" />
        </figure>
    </a>
</header>
@yield('content')
<!-- Footer opened -->
<footer>
    <div class="container">
        <div class="footer-cont">
            <span>تصميم وتطوير </span>
            <img src="{{asset('front-end/images/raiyan.png')}}" alt="raiyansoft" />
        </div>
    </div>
</footer>
    @include('front-end.layouts.js')
</body>

</html>
