
@can('delete courses')
    <button type="button" class="btn btn-danger delete-btn" data-url="{{ route('contests.destroy',$id) }}" data-name="{{ $name }}"><i class="bi bi-trash-fill"></i></button>
@endcan

@can('update courses')
    <a href="{{route('contests.edit',$id)}}" type="button" class="btn btn-info mr-2"><i class="bi bi-pencil-fill"></i></a>

    <a href="{{route('results.index',$id)}}" type="button" class="btn btn-info mr-2">Results</a>

@endcan

