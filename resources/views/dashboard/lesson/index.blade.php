@extends('layouts.dashboard')

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
                            <th>Grade</th>
                            <th>Subject</th>
                            <th>Lesson</th>
                            <th>Uploader</th>
                            <th>Control</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $lesson)
                            <tr>
                                <td>{{$lesson->getGrade->title}}</td>
                                <td>{{$lesson->getSubject->title}}</td>
                                <td><span class="fw-bolder">{{$lesson->title}}</span><br>{{$lesson->excerpt}}</td>
                                <td>{{$lesson->getUser->name}}</td>
                                <td>
                                    <a href="{{ route('lesson.edit',$lesson->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="uil-pen"></i>
                                    </a>
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


