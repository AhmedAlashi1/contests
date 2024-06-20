
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

<!-- preloader -->

@yield('content')
<!-- Footer opened -->
<footer  >

    <div class="container">

        <div class="footer-cont">
{{--               <span> Copyright © 2024 <a href="javascript:void(0);" class="text-primary"></a>. Designed with--}}
{{--                    <span class="fa fa-heart text-danger"></span> by <a href="https://raiyansoft.com/"> RaiyanSoft</a> All--}}
{{--                    rights reserved</span>--}}
            <span>تصميم وتطوير </span>
            <a href="https://raiyansoft.com/" >
                <img src="{{asset('front-end/images/raiyan.png')}}" alt="raiyansoft" />
            </a>
        </div>
    </div>
</footer>
    @include('front-end.layouts.js')
</body>

</html>
