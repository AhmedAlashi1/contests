
{{--@can('delete courses')--}}
    <button type="button" class="btn btn-danger delete-btn" data-url="{{ route('contests.destroy',$id) }}" data-name="{{ $name }}" style="margin-top: 5px"><i class="bi bi-trash-fill"></i></button>
{{--@endcan--}}

{{--@can('update courses')--}}
    <a href="{{route('contests.edit',$id)}}" type="button" class="btn btn-info mr-2" style="margin-top: 5px"><i class="bi bi-pencil-fill"></i></a>

    <a href="{{route('results.index',$id)}}" type="button" class="btn btn-info mr-2" style="background-color: #151A6A ;border-color :#151A6A;margin-top: 5px ">Results</a>
    <a href="{{route('contests.winner',$id)}}" type="button" class="btn btn-warning mr-2" style="margin-top: 5px ">winner</a>

{{--@endcan--}}

