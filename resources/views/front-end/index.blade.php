@extends('front-end.layouts.master')
@section('content')

    <div class="main-img">
      <figure>
        <img src="{{asset('front-end/images/main.jpeg')}}" alt="bg" />
      </figure>
    </div>
    <section class="quiz-section">
      <div class="container">
        <h3 class="section-title">المسابقات</h3>
        <div class="quiz-cont">
            @foreach($contests as  $contest)
          <a href="{{route('quiz-page',$contest->id)}}" class="quiz-card">
            <figure>
              <img src="{{url($contest->image)}}" alt="quiz-img" />
            </figure>
            <div class="card-content">
              <h4 class="card-title">{{$contest->title}}</h4>
{{--                {{$contest->start_time}}--}}
{{--                <br>--}}
{{--                {{$contest->end_time}}--}}

                    @if($contest->start_time < \Carbon\Carbon::now() && $contest->end_time > \Carbon\Carbon::now() )
                    <div class="card-status status-ended">جارية</div>
                    @elseif($contest->start_time > \Carbon\Carbon::now())
                    <div class="card-status status-unstart"> لم تبدأ</div>
                  @elseif($contest->end_time < \Carbon\Carbon::now())
                    <div class="card-status status-closed">   انتهت</div>
                  @endif


              <div class="countdown-container">
                <div class="counttimer" id="{{$contest->id}}"></div>
              </div>
              <span class="card-foot">لبدأ المسابقة</span>
            </div>
          </a>
            @endforeach
{{--          <a href="#" class="quiz-card">--}}
{{--            <figure>--}}
{{--              <img src="{{asset('front-end/images/item.jpeg')}}" alt="quiz-img" />--}}
{{--            </figure>--}}
{{--            <div class="card-content">--}}
{{--              <h4 class="card-title">توقع مباراة نهائي دوري الأبطال</h4>--}}
{{--              <div class="card-status status-closed">اغلقت</div>--}}
{{--              <div class="countdown-container">--}}
{{--                <div class="counttimer" id="newcountdown"></div>--}}
{{--              </div>--}}
{{--              <span class="card-foot">تم إغلاق المسابقة</span>--}}
{{--            </div>--}}
{{--          </a>--}}
{{--          <a href="#" class="quiz-card">--}}
{{--            <figure>--}}
{{--              <img src="{{asset('front-end/images/item.jpeg')}}" alt="quiz-img" />--}}
{{--            </figure>--}}
{{--            <div class="card-content">--}}
{{--              <h4 class="card-title">توقع مباراة نهائي دوري الأبطال</h4>--}}
{{--              <div class="card-status status-ended">تم السحب</div>--}}
{{--              <div class="countdown-container">--}}
{{--                <div class="counttimer" id="fcountdown"></div>--}}
{{--              </div>--}}
{{--              <span class="card-foot">تم إعلان الفائز</span>--}}
{{--            </div>--}}
{{--          </a>--}}
        </div>

      </div>

    </section>
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-md-auto">
            {{ $contests->links() }}
        </div>
    </div>
    <script>
{{--        @foreach($contests as  $contest)--}}
{{--        CountDownTimer("02/19/2025 10:01:00 AM", "{{$contest->id}}");--}}
{{--        @endforeach--}}
        @foreach($contests as  $contest)
        CountDownTimer("{{ \Carbon\Carbon::parse($contest->start_time)->format('m/d/Y h:i:s A') }}", "{{$contest->id}}");
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
