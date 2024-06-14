@extends('front-end.layouts.master')
@section('content')
    <!-- preloader -->
    @foreach($errors->all() as $error)
       <script> toastr.error("{{ $error }}");</script>
{{--        <div class="alert alert-danger">{{ $error }}</div>--}}
    @endforeach
{{--    <div class="main-img">--}}
        <figure>
            <img src="{{url($contest->image)}}" alt="bg" style="width: 100%; max-height: 300px; margin-bottom: 20px "  />
        </figure>
{{--    </div>--}}
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

@endsection
