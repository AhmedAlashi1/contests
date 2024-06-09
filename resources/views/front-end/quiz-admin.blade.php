@extends('front-end.layouts.master')
@section('content')
    <!-- preloader -->

    <div class="main-bg">
      <div class="container">
        <figure>
          <img src="{{url($contest->image)}}" alt="bg" />
        </figure>
      </div>
    </div>
    <section class="quiz-section">
      <div class="container">
        <div class="quiz-page">
          <div class="quiz-content">
            <h4 class="card-title">{{$contest->title}}</h4>
{{--            <div class="countdown-container">--}}
{{--              <div class="counttimer" id="countdown"></div>--}}
{{--            </div>--}}
{{--            <span class="card-foot">لأغلاق المسابقة</span>--}}
          </div>
        </div>
        <div class="quiz-form">
          <form action="">
            <div class="form-group">
              <label class="form-label required">
                  {{$contest->question}}
              </label>
{{--              <p class="card-pargh">اختر الاجابة الصحيحة</p>--}}
              <div class="check-group">
                  @if($contest->answer_1)
                      <div class="check-width">
                          <label class="check-label">
                              <input type="radio" name="answer"  value="{{$contest->answer_1}}" @if($contest->correct_answer == $contest->answer_1 )checked @endif  disabled />
                              <span class="checkmark"></span>
                              <span class="check-text"> {{$contest->answer_1}} </span>
                          </label>
                      </div>
                  @endif
                      @if($contest->answer_2)
                          <div class="check-width">
                              <label class="check-label">
                                  <input type="radio" name="answer"  value="{{$contest->answer_2}}" @if($contest->correct_answer == $contest->answer_2 )checked @endif  disabled  />
                                  <span class="checkmark"></span>
                                  <span class="check-text"> {{$contest->answer_2}} </span>
                              </label>
                          </div>
                      @endif
                      @if($contest->answer_3)
                          <div class="check-width">
                              <label class="check-label">
                                  <input type="radio" name="answer"  value="{{$contest->answer_3}}" @if($contest->correct_answer == $contest->answer_3 )checked @endif  disabled  />
                                  <span class="checkmark"></span>
                                  <span class="check-text"> {{$contest->answer_3}} </span>
                              </label>
                          </div>
                      @endif
                      @if($contest->answer_4)
                          <div class="check-width">
                              <label class="check-label">
                                  <input type="radio" name="answer"  value="{{$contest->answer_4}}" @if($contest->correct_answer == $contest->answer_4 )checked @endif  disabled />
                                  <span class="checkmark"></span>
                                  <span class="check-text"> {{$contest->answer_4}} </span>
                              </label>
                          </div>
                      @endif
              </div>
            </div>
            <div class="form-btn-cont">
              <button class="form-btn" type="button" id="spin">
                بدأ السحب
              </button>
            </div>
          </form>
        </div>

        <div class="winner-spin">
          <div class="wheel-spin-box">
            <div id="spinwheel">
              <div class="wheeldotsround"></div>
            </div>
            <div id="spin-arrow" class="wheel-spin-arrow">
              <svg
                width="83"
                height="74"
                viewBox="0 0 83 74"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M32.9489 5.12466C33.8289 3.59888 35.0943 2.3319 36.618 1.45104C38.1417 0.570174 39.8701 0.106445 41.6294 0.106445C43.3888 0.106445 45.1171 0.570174 46.6409 1.45104C48.1646 2.3319 49.43 3.59888 50.31 5.12466L80.9178 58.1922C81.7993 59.7185 82.264 61.4504 82.265 63.2137C82.2659 64.9769 81.8032 66.7094 80.9234 68.2366C80.0435 69.7639 78.7776 71.0322 77.2529 71.9139C75.7282 72.7955 73.9986 73.2595 72.238 73.2591H11.0223C9.26269 73.259 7.53405 72.7951 6.01016 71.9139C4.48627 71.0327 3.22083 69.7653 2.34102 68.2391C1.46121 66.7128 0.998036 64.9815 0.998047 63.2192C0.998058 61.4569 1.46125 59.7256 2.34108 58.1994L32.9489 5.12466Z"
                  fill="#2F911E"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="overlay" id="spinOverlay">
      <button id="close-overlay" onclick="closeSpin()">
        <i class="las la-times"></i>
      </button>
      <div class="spin-result">
        <h3>الفائز هو</h3>
        <span id="spinWinner"></span>
          <form action="{{route('contests.winner-store')}}" method="post">
              @csrf
              <input type="hidden" name="contest_id" value="{{$contest->id}}">
              <input type="hidden" name="winner_id" id="spinWinner2" value="">
              <button class="form-btn" type="submit" style="padding : 0px 130px;">تأكيد</button>
          </form>

        <button class="form-btn" onclick="closeSpin()">إغلاق</button>

      </div>
      <div class="spin-img">
        <img
          class="celecbrite-2"
          src="{{asset('front-end/images/celebrite-2.gif')}}"
          alt="celecbrite"
        />
        <img
          class="celecbrite-1"
          src="{{asset('front-end/images/celebrite-1.gif')}}"
          alt="celecbrite"
        />
      </div>
    </div>
<script>
    var data = [
        @foreach($winners as $winner)
        { label: "{{$winner->user_name}}", value: 1, xp: "{{$winner->user_name}}" ,id_user: "{{$winner->id}}"},
        @endforeach

    ];
</script>


@endsection
