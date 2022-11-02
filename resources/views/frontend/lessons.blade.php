@extends('layouts.main.frontend')
@include('layouts.frontend.navbar')
@section('content')
<div class="container-fluid ">
    <div class="container">
        @include('layouts.frontend.lessons_control_navbar')
        <div class="row">
            @foreach($lessons as $lesson)
                <div class="col-lg-3 mt-3">
                    <div class="">
                        <div class="card">
                            @if($lesson->header_image)
                                <img style="height: 200px" src="{{asset('storage/header_image/'.$lesson->header_image)}}" class="card-img-top" alt="...">
                            @else
                                <img style="height: 200px" src="{{asset('frontend/assets/img/photo.jpg')}}" alt="">
                            @endif
                            <div class="card-body">
                                <small>written: <span class="text-info fw-bolder">{{$lesson->getUser->name}}</span></small>
                                <h6 class="card-title fw-bolder mt-3">{{$lesson->excerpt_title}}</h6>
                                <p class="card-text">{{$lesson->excerpt}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-grid">
                                        <small class="m-0 fw-bold">{{$lesson->getGrade->title}}</small>
                                        <small class="m-0 fw-bold">{{$lesson->getSubject->title}}</small>
                                    </div>
                                    <a href="{{route('frontend.lesson.show',$lesson->id)}}" class="btn btn-primary">learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="my-5" id="pagination">
            {{$lessons->onEachSide(1)->links()}}
        </div>
    </div>
</div>

@endsection
