{{--<a onclick="st(this)" data-status="{{ $courses->status }}">--}}
{{--    <i--}}
{{--        id="icon"--}}
{{--        data-id="{{$courses->id}}"--}}
{{--        class="icon {{ $courses->status == 1 ? 'ion-ios-checkmark' : 'ion-ios-close' }}"--}}
{{--        style="color: {{ $courses->status == 1 ? '#00eb1b' : 'red' }}; font-size: 2rem; cursor: pointer;"--}}
{{--    ></i>--}}
{{--</a>--}}

<a onclick="st(this)" data-status="{{ $points->status }}">
    <i
        class="icon {{ $points->status == 1 ? 'ion-ios-checkmark' : 'ion-ios-close' }}"
        data-id="{{$points->id}}"
        style="color: {{ $points->status == 1 ? '#00eb1b' : 'red' }}; font-size: 2rem; cursor: pointer;"
    ></i>
</a>
