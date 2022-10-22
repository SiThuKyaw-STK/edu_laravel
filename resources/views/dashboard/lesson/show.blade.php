@extends('layouts.main.dashboard')
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item fw-bolder"><a href="{{route('lesson.index')}}" class="text-secondary">Lessons</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$lesson->title}}</li>
    </x-bread-crumb>
    <div class="row m-0">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="m-0 h4">
                            <i class="uil-info-circle text-secondary"></i>
                            Info of Lesson
                        </h4>
                        <a href="{{route('lesson.edit',$lesson->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                    </div>
                    <hr>
                    @if(isset($lesson->header_image))
                        <img class="header_image mb-3" src="{{asset('storage/header_image/'.$lesson->header_image)}}" alt="">
                    @endif
                    <h3 class="text-secondary">{{$lesson->title}}</h3>
                    <div class="">
                        <span class="fw-bolder"><i class="uil-backpack"></i>{{$lesson->getGrade->title}}</span>
                        <span class="fw-bolder"><i class="uil-book-alt"></i>{{$lesson->getSubject->title}}</span>
                        <span class="fw-bolder"><i class="uil-user"></i>{{$lesson->getUser->name}}</span>
                        <span class="fw-bolder"><i class="uil-calendar-alt"></i>{{$lesson->created_at->diffForHumans()}}</span>
                    </div>
                    <p style="text-align: justify">{{$lesson->description}}</p>

                    @foreach($lesson->getLessonImages as $photo)
                        <img class="lesson_image" src="{{asset('storage/lesson_image/'.$photo->name)}}" alt="">
                    @endforeach

                    <hr>
                    <a href="{{route('lesson.index')}}" class="btn btn-sm btn-outline-secondary float-end">All Lesson</a>
                </div>
            </div>
        </div>
    </div>
@endsection
