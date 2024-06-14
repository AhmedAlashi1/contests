@extends('front-end.layouts.master')
@section('content')

    <!-- preloader -->
    <div class="preloader">
      <div class="progress">
        <div class="progress-bar"></div>
      </div>
    </div>
    <!-- preloader -->
    <section class="header-cont">
        <header class="upper-head">
            <a href="{{url('/')}}" class="logo-ancor">
                <figure class="logo-img">
                    <img src="{{asset('front-end/images/logo.png')}}" alt="logo" class="img-fluid" />
                </figure>
            </a>
            <button
                type="button"
                class="points-btn"
                data-bs-toggle="modal"
                data-bs-target="#staticBackdrop"
            >
                النقاط
            </button>
        </header>
        <div class="main-img">
            <figure class="main-figure">
                <img src="{{asset('front-end/images/main.png')}}" alt="bg" />
            </figure>
            <figure
                class="float-img"
                style="background-image: url({{url('front-end/images/float.gif')}})"
            >
                <!-- <img src="images/float.gif" alt="bg"> -->
            </figure>
        </div>

    </section>
    <section class="quiz-section">
    <div class="container">
        <div class="quiz-page">
            <div class="quiz-content">
                <h4 class="card-title">{{$contest->title}}</h4>
                <div class="countdown-container">
                    <div class="counttimer" id="{{$contest->id}}-end"></div>
                </div>
                <span class="card-foot">لأغلاق المسابقة</span>
            </div>
        </div>
        <div class="quiz-form">
            <form action="{{route('results.store')}}">
                <input type="hidden" value="{{$contest->id}}" name="contest_id">
                <div class="form-group">
                    <label class="form-label required">
                        {{$contest->question}}
                    </label >
                    <div class="check-group">
                        @if($contest->answer_1)
                            <div class="check-width">
                                <label class="check-label">
                                    <input type="radio" name="answer"  value="{{$contest->answer_1}}" @if(old($contest->answer) == $contest->answer_1 )checked @endif  />
                                    <span class="checkmark"></span>
                                    <span class="check-text"> {{$contest->answer_1}} </span>
                                </label>
                            </div>
                        @endif
                        @if($contest->answer_2)
                            <div class="check-width">
                                <label class="check-label">
                                    <input type="radio" name="answer"  value="{{$contest->answer_2}}" @if(old($contest->answer) == $contest->answer_2) checked @endif  />
                                    <span class="checkmark"></span>
                                    <span class="check-text"> {{$contest->answer_2}} </span>
                                </label>
                            </div>
                        @endif
                        @if($contest->answer_3)
                            <div class="check-width">
                                <label class="check-label">
                                    <input type="radio" name="answer"  value="{{$contest->answer_3}}" @if(old($contest->answer) == $contest->answer_3 )checked @endif  />
                                    <span class="checkmark"></span>
                                    <span class="check-text"> {{$contest->answer_3}} </span>
                                </label>
                            </div>
                        @endif
                        @if($contest->answer_4)
                            <div class="check-width">
                                <label class="check-label">
                                    <input type="radio" name="answer"  value="{{$contest->answer_4}}" @if(old($contest->answer) == $contest->answer_4 )checked @endif />
                                    <span class="checkmark"></span>
                                    <span class="check-text"> {{$contest->answer_4}} </span>
                                </label>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-input" name="user_name" value="{{old('user_name')}}" placeholder="ادخل يوزر سناب شات الخاص بك"/>
                </div>
                <div class="form-btn-cont">
                    @if($contest->start_time < now())
                        <button class="form-btn" type="submit" >ارسال</button>
                    @else
                        <a class="form-btn" style="background-color:black" disabled>لم تبداء المسابقة بعد</a>
                    @endif


                </div>
            </form>
        </div>
    </div>
    </section>
    <!-- related slider -->
    <section class="related-slider">
        <div class="container">
            <h3 class="section-title">المسابقات ذات صلة</h3>
        </div>
        <div class="swiper-cont">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($suggested_competitions as  $contes)
                        <div class="swiper-slide">
                            <a href="{{route('quiz-page',$contes->id)}}" class="quiz-card">
                                <figure>
                                    <img src="{{url($contes->image)}}" alt="quiz-img" />
                                </figure>
                                <div class="card-content">
                                    <h4 class="card-title">{{$contes->title}}</h4>

                                    @if($contes->start_time < \Carbon\Carbon::now() && $contes->end_time > \Carbon\Carbon::now() )
                                        <div class="card-status status-ended">جارية</div>
                                    @elseif($contes->start_time > \Carbon\Carbon::now())
                                        <div class="card-status status-unstart"> لم تبدأ</div>
                                    @elseif($contes->end_time < \Carbon\Carbon::now())
                                        @if($contes->winner_id)
                                            <div class="card-status status-ended">   تم السحب</div>
                                        @else
                                            <div class="card-status status-closed">   انتهت</div>
                                        @endif
                                    @endif


                                    <div class="countdown-container">
                                        <div class="counttimer" id="{{$contes->id}}"></div>
                                    </div>
                                    <span class="card-foot">لبدأ المسابقة</span>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>
    <!-- related slider -->
    <script>

        CountDownTimer("{{ \Carbon\Carbon::parse($contest->end_time)->format('m/d/Y h:i:s A') }}", "{{$contest->id}}-end");

        @foreach($suggested_competitions as  $contests)
        CountDownTimer("{{ \Carbon\Carbon::parse($contests->start_time)->format('m/d/Y h:i:s A') }}", "{{$contests->id}}");
        @endforeach


        function CountDownTimer(dt, id) {
            var end = new Date(dt);

            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;

            function showRemaining() {
                var now = new Date();
                var distance = end - now;
                if (distance < 0) {
                    clearInterval(timer);
                    document.getElementById(id).innerHTML =
                        "<span>" + 0 + "<span> يوم </span></span>";
                    document.getElementById(id).innerHTML +=
                        "<span>" + 0 + "<span> ساعة </span></span>";
                    document.getElementById(id).innerHTML +=
                        "<span>" + 0 + "<span>دقيقه <span></span>";
                    document.getElementById(id).innerHTML +=
                        "<span>" + 0 + "<span>ثانيه </span></span>";

                    return;
                }
                var days = Math.floor(distance / _day);
                var hours = Math.floor((distance % _day) / _hour);
                var minutes = Math.floor((distance % _hour) / _minute);
                var seconds = Math.floor((distance % _minute) / _second);

                document.getElementById(id).innerHTML =
                    "<span>" + days + "<span> يوم </span></span>";
                document.getElementById(id).innerHTML +=
                    "<span>" + hours + "<span> ساعة </span></span>";
                document.getElementById(id).innerHTML +=
                    "<span>" + minutes + "<span>دقيقه <span></span>";
                document.getElementById(id).innerHTML +=
                    "<span>" + seconds + "<span>ثانيه </span></span>";
            }

            timer = setInterval(showRemaining, 1000);
        }
    </script>
    <!-- Modal -->
    <div
      class="modal fade"
      id="staticBackdrop"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">
              نقاط الفائزين
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ><i class="las la-times"></i></button>
          </div>
          <div class="modal-body">
            <ul class="points-list">
              <li>
                <span class="points-name">نادر أحمد</span>
                <span class="points-num"> 125 نقطة</span>
              </li>
              <li>
                <span class="points-name">نادر أحمد</span>
                <span class="points-num"> 125 نقطة</span>
              </li>
              <li>
                <span class="points-name">نادر أحمد</span>
                <span class="points-num"> 125 نقطة</span>
              </li>
              <li>
                <span class="points-name">نادر أحمد</span>
                <span class="points-num"> 125 نقطة</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection

