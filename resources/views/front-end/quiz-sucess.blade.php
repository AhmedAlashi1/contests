@extends('front-end.layouts.master')
@section('content')
    <!-- preloader -->

    <!-- preloader -->
    <section class="single-page">
      <div class="container">

        <div class="page-cont">
          <div class="page-container">
            <div class="success-cont">
              <h1 class="success-icon wow fadeInDown" wow-data-delay="5s">
                <i class="las la-check-circle"></i>
              </h1>
              <h2 class="success-title">تم تسجيل اجابتك بنجاح</h2>
              <p class="success-pargh">يمكنك زيارة الصفحة الرائيسية</p>
              <a href="{{route('quiz.index')}}" class="apply-btn" rel="nofollow"> الذهاب الى</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div style="margin-bottom: 254px">

    </div>

@endsection
