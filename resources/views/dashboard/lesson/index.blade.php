@extends('layouts.main.dashboard')

@section('content')
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
                                        <button class="btn btn-sm btn-outline-danger">
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


