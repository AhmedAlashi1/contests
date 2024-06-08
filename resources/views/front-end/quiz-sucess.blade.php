@extends('front-end.layouts.master')
@section('content')
    <!-- preloader -->
    <div class="preloader">
      <div class="progress">
        <div class="progress-bar"></div>
      </div>
    </div>
    <!-- preloader -->
    <section class="single-page">
      <div class="container">
        <header class="upper-head">
          <a href="index.html" class="logo-ancor">
            <figure class="logo-img">
              <img src="images/logo.png" alt="logo" class="img-fluid" />
            </figure>
          </a>
        </header>
        <div class="page-cont">
          <div class="page-container">
            <div class="success-cont">
              <h1 class="success-icon wow fadeInDown" wow-data-delay="5s">
                <i class="las la-check-circle"></i>
              </h1>
              <h2 class="success-title">تم تسجيل اجابتك بنجاح</h2>
              <p class="success-pargh">يمكنك زيارة .................</p>
              <a href="#" class="apply-btn" rel="nofollow"> الذهاب الى</a>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
