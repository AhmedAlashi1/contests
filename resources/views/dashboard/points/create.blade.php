
@extends('dashboard.layouts.master')
@section('title', __('messages.Add Muscles') )

@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <form id="fileUploadForm" class="needs-validation was-validated" action="{{route('points.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="title_ar">{{ __('messages.name') }}  :</label>
                                <input value="{{old('name')}}" id="title_ar" type="text" class="form-control " name="name"  required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 has-success mg-t-10">
                                <label for="title_ar">{{ __('messages.points') }}  :</label>
                                <input value="{{old('points')}}" id="points" type="text" class="form-control " name="point"  required>
                                @error('points')
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
