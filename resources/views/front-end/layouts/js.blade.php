<script src="{{asset('front-end/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('front-end/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front-end/js/swiper.min.js')}}"></script>
<script src="{{url('https://d3js.org/d3.v3.min.js')}}"></script>
<script src="{{asset('front-end/js/script.js')}}"></script>


<script>
    CountDownTimer("02/19/2025 10:1 AM", "countdown");
    CountDownTimer("02/20/2025 10:1 AM", "newcountdown");
    CountDownTimer("02/20/2022 10:1 AM", "fcountdown");

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



