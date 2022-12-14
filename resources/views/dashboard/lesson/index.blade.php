@extends('layouts.main.dashboard')

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Lessons</li>
    </x-bread-crumb>
    <div class="row m-0">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0 h4">
                        <i class="uil-list-ol-alt text-secondary"></i>
                        Lessons List
                    </h4>
                    <hr>
                    <table id="d-table" class="display hover cell-border nowrap" style="width:100%">
                        <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Grade</th>
                            <th>Subject</th>
                            <th>Lesson</th>
                            @if(\Illuminate\Support\Facades\Auth::user()->role != 2)
                            <th>Uploader</th>
                            @endif
                            <th>Control</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $lesson)
                            <tr>
                                <td>{{$lesson->id}}</td>
                                <td>{{$lesson->getGrade->title}}</td>
                                <td>{{$lesson->getSubject->title}}</td>
                                <td><span class="fw-bolder">{{$lesson->title}}</span><br>{{$lesson->excerpt}}</td>
                                @if(\Illuminate\Support\Facades\Auth::user()->role != 2)
                                <td>{{$lesson->getUser->name}}</td>
                                @endif
                                <td>
                                    <a href="{{route('lesson.show',$lesson)}}" class="btn btn-sm btn-outline-secondary">
                                        <i class="uil-info"></i>
                                    </a>
                                    @can('update',$lesson)
                                    <a href="{{ route('lesson.edit',$lesson->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="uil-pen"></i>
                                    </a>
                                    @endcan
                                    @can('delete',$lesson)
                                    <form action="{{ route('lesson.destroy',$lesson->id) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger show-alert-delete-box">
                                            <i class="uil uil-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                                <td>{{$lesson->created_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.show-alert-delete-box').click(function(event){
            let form =  $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
@endpush
