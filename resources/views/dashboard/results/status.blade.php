{{--<a onclick="st(this)" data-status="{{ $courses->status }}">--}}
{{--    <i--}}
{{--        id="icon"--}}
{{--        data-id="{{$courses->id}}"--}}
{{--        class="icon {{ $courses->status == 1 ? 'ion-ios-checkmark' : 'ion-ios-close' }}"--}}
{{--        style="color: {{ $courses->status == 1 ? '#00eb1b' : 'red' }}; font-size: 2rem; cursor: pointer;"--}}
{{--    ></i>--}}
{{--</a>--}}

{{--<a onclick="st(this)" data-status="{{ $results->answer }}">--}}
    <i
        class="icon {{ $results->answer == $results->contest->correct_answer ? 'ion-ios-checkmark' : 'ion-ios-close' }}"
        data-id="{{$results->id}}"
        style="color: {{ $results->answer == $results->contest->correct_answer ? '#00eb1b' : 'red' }}; font-size: 2rem; cursor: pointer;"
    ></i>
{{--</a>--}}
