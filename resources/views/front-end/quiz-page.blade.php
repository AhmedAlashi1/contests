@extends('front-end.layouts.master')
@section('content')
    <!-- preloader -->

    <section class="quiz-section">
      <div class="container">
        <div class="quiz-page">
          <div class="quiz-content">
            <h4 class="card-title">توقع مباراة نهائي دوري الأبطال</h4>
            <div class="countdown-container">
              <div class="counttimer" id="countdown"></div>
            </div>
            <span class="card-foot">لأغلاق المسابقة</span>
          </div>
        </div>
        <div class="quiz-form">
          <form action="quiz-sucess.html">
            <div class="form-group">
              <label class="form-label required">
                توقع نتيجة المباراة النهائية لدوري الأبطال 2024 بين فريق ريال
                مدريد وفريق بروسيا دورتموند</label
              >
              <div class="check-group">
                <div class="check-width">
                  <label class="check-label">
                    <input type="radio" name="age" />
                    <span class="checkmark"></span>
                    <span class="check-text"> فوز ريال مدريد </span>
                  </label>
                </div>
                <div class="check-width">
                  <label class="check-label">
                    <input type="radio" name="age" />
                    <span class="checkmark"></span>
                    <span class="check-text">فوز بروسيا دورتموند</span>
                  </label>
                </div>
                <div class="check-width">
                  <label class="check-label">
                    <input type="radio" name="age" />
                    <span class="checkmark"></span>
                    <span class="check-text"> تعادل الفريقين</span>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input
                type="text"
                class="form-input"
                placeholder="ادخل يوزر سناب شات الخاص بك"
              />
            </div>
            <div class="form-btn-cont">
              <button class="form-btn" type="submit">ارسال</button>
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
            <div class="swiper-slide">
              <a href="quiz-page.html" class="quiz-card">
                <figure>
                  <img src="images/item.jpeg" alt="quiz-img" />
                </figure>
                <div class="card-content">
                  <h4 class="card-title">توقع مباراة نهائي دوري الأبطال</h4>
                  <div class="card-status status-unstart">لم تبدأ</div>
                  <div class="countdown-container">
                    <div class="counttimer" id="newcountdown"></div>
                  </div>
                  <span class="card-foot">لبدأ المسابقة</span>
                </div>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="quiz-page.html" class="quiz-card">
                <figure>
                  <img src="images/item.jpeg" alt="quiz-img" />
                </figure>
                <div class="card-content">
                  <h4 class="card-title">توقع مباراة نهائي دوري الأبطال</h4>
                  <div class="card-status status-unstart">لم تبدأ</div>
                  <div class="countdown-container">
                    <div class="counttimer" id="fcountdown"></div>
                  </div>
                  <span class="card-foot">لبدأ المسابقة</span>
                </div>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="quiz-page.html" class="quiz-card">
                <figure>
                  <img src="images/item.jpeg" alt="quiz-img" />
                </figure>
                <div class="card-content">
                  <h4 class="card-title">توقع مباراة نهائي دوري الأبطال</h4>
                  <div class="card-status status-closed">اغلقت</div>
                  <div class="countdown-container">
                    <div class="counttimer" id="ncountdown"></div>
                  </div>
                  <span class="card-foot">لبدأ المسابقة</span>
                </div>
              </a>
            </div>
            <div class="swiper-slide">
              <a href="quiz-page.html" class="quiz-card">
                <figure>
                  <img src="images/item.jpeg" alt="quiz-img" />
                </figure>
                <div class="card-content">
                  <h4 class="card-title">توقع مباراة نهائي دوري الأبطال</h4>
                  <div class="card-status status-unstart">لم تبدأ</div>
                  <div class="countdown-container">
                    <div class="counttimer" id="bcountdown"></div>
                  </div>
                  <span class="card-foot">لبدأ المسابقة</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- related slider -->
@endsection
