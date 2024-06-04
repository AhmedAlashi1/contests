
@extends('dashboard.layouts.master')
@section('title', __('messages.update Muscles') )

@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <div class="main-img-user"><img alt="" src="{{ $contests->image != '' ? asset($contests->image) : asset('dashboard/img/users/6.jpg') }}" class=""></div>
                        </div>

                    </div>
                    <form id="fileUploadForm" class="needs-validation was-validated" action="{{route('contests.update',$contests->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row row-sm">

                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="title_ar">{{ __('messages.title') }}  :</label>
                                <input value="{{$contests->title}}" id="title" type="text" class="form-control " name="title"  required>
                                @error('name_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="title_ar">{{ __('messages.question') }}  :</label>
                                <input value="{{$contests->question}}" id="title" type="text" class="form-control " name="question"  required>
                                @error('question')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="title_ar">{{ __('messages.answer_1') }}  :</label>
                                <input value="{{$contests->answer_1}}" id="answer_1" type="text" class="form-control " name="answer_1"  required>
                                @error('answer_1')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="title_ar">{{ __('messages.answer_2') }}  :</label>
                                <input value="{{$contests->answer_2}}" id="answer_2" type="text" class="form-control " name="answer_2"  required>
                                @error('answer_2')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="title_ar">{{ __('messages.answer_3') }}  :</label>
                                <input value="{{$contests->answer_3}}" id="answer_3" type="text" class="form-control " name="answer_3"  >
                                @error('answer_3')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="title_ar">{{ __('messages.answer_4') }}  :</label>
                                <input value="{{$contests->answer_4}}" id="answer_4" type="text" class="form-control " name="answer_4"  >
                                @error('answer_4')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="title_ar">{{ __('messages.start_time') }}  :</label>
                                <input value="{{$contests->start_time}}" id="start_time" type="datetime-local" class="form-control " name="start_time"  >
                                @error('start_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="title_ar">{{ __('messages.end_time') }}  :</label>
                                <input value="{{$contests->end_time}}" id="end_time" type="datetime-local" class="form-control " name="end_time"  >
                                @error('end_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="exampleInputEmail1">{{ __('messages.correct_answer') }} :</label>
                                <select class="testselect2" name="correct_answer">
                                    <option value="" ></option>
                                    <option value="{{$contests->answer_1}}" @selected($contests->correct_answer == $contests->answer_1) >{{$contests->answer_1}}</option>
                                    <option value="{{$contests->answer_2}}" @selected($contests->correct_answer == $contests->answer_2)>{{$contests->answer_2}}</option>
                                    @if($contests->answer_3)
                                    <option value="{{$contests->answer_3}}" @selected($contests->correct_answer == $contests->answer_3)>{{$contests->answer_3}}</option>
                                    @endif
                                    @if($contests->answer_4)
                                    <option value="{{$contests->answer_4}}" @selected($contests->correct_answer == $contests->answer_4)>{{$contests->answer_4}}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="exampleInputEmail1">{{ __('messages.suggested_competitions') }} :</label>
                                <select class="testselect2" name="suggested_competitions[]" multiple="multiple" >
                                    @foreach($suggested_competitions  as $suggested_competition)
                                        <option value="{{$suggested_competition->id}}" {{ in_array($suggested_competition->id, @json_decode($contests->suggested_competitions) ?? []) ? 'selected' : '' }}>{{$suggested_competition->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-12 has-success mg-t-10">
                                <label for="image">{{ __('messages.photo') }}  :</label>
                                <input id="image" type="file" class="form-control " name="photo">
                                @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <div class="form-group col-md-12 has-success mg-t-20">
                                    <button type="submit" class="btn btn-success" >{{ __('messages.save') }}</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-green"
                                         role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                         style="width: 0%; background-color: green">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script src="{{URL::asset('dashboard/js/advanced-form-elements.js')}}"></script>
    <script src="{{URL::asset('dashboard/js/select2.js')}}"></script>
    <script src="{{URL::asset('dashboard/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
@stop
