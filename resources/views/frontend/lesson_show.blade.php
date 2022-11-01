@extends('layouts.main.frontend')
@include('layouts.frontend.navbar')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between py-2">
                        <select class="form-select w-25" aria-label=".form-select-sm example">
                            <option selected>Select Grade</option>
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->title}}</option>
                            @endforeach
                        </select>
                        <form class="input-group w-25" role="search">
                            <input class="form-control" type="search" name="search" placeholder="Search"
                                   aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit"><i class="uil-search-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            {{--Header Image--}}
                            @if($lesson->header_image)
                                <div class="text-center">
                                    <img class="" src="{{asset('storage/header_image/'.$lesson->header_image)}}"
                                         alt="">
                                </div>
                            @endif

                            {{--Uploader Name & Image--}}
                            <div class="mt-4">
                                <span class="fw-bolder text-info lesson__showDetail">By:{{$lesson->getUser->name}}
                                    @if($lesson->getUser->user_image)
                                        <img src="{{asset('storage/profile/'.$lesson->getUser->user_image)}}" alt="">
                                    @else
                                        <img src="{{asset('dashboard/assets/img/user.png')}}">
                                    @endif
                                </span>
                            </div>

                            {{--Title--}}
                            <h3 class="fw-bolder">{{$lesson->title}}</h3>

                            {{--Lesson Detail--}}
                            <div class="text-secondary">
                                <span class="fw-bolder"><i class="uil-backpack"></i>{{$lesson->getGrade->title}}</span>
                                <span class="fw-bolder"><i
                                        class="uil-book-alt"></i>{{$lesson->getSubject->title}}</span>
                                <span class="fw-bolder"><i class="uil-calendar-alt"></i>{{$lesson->created_at->diffForHumans()}}</span>
                            </div>

                            {{--Lesson Slide Show Image--}}
                            @if($lesson->getLessonImages)
                                <ul id="imageGallery" class="text-center">
                                    @foreach($lesson->getLessonImages as $image)
                                        <li data-src="{{asset('storage/lesson_image/'.$image->name)}}"
                                            data-thumb="{{asset('storage/lesson_image/'.$image->name)}}">
                                            <img style="object-fit: contain;height: 300px" class="w-100"
                                                 src="{{asset('storage/lesson_image/'.$image->name)}}" alt="">
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            {{--Lesson Description--}}
                            <p class="mt-3" style="text-align: justify">{{$lesson->description}}</p>

                            @php
                                $nextLesson = \App\Models\Lesson::where('id','<',$lesson->id)->latest('id')->first();
                                $previousLesson = \App\Models\Lesson::where('id','>',$lesson->id)->first();
                            @endphp

                            <div class="nav d-flex justify-content-between p-3">
                                <a href="{{isset($previousLesson)? route('frontend.lesson.show',$previousLesson->id) : '#'}}"
                                   class="btn btn-outline-primary page-mover rounded-circle d-flex align-items-center @empty($previousLesson) disabled @endempty">
                                    <i class="uil-arrow-left"></i>
                                </a>

                                <a class="btn btn-outline-primary px-3 rounded-pill"
                                   href="{{route('frontend.lessons')}}">
                                    Read All
                                </a>

                                <a href="{{isset($nextLesson)? route('frontend.lesson.show',$nextLesson->id) : '#'}}"
                                   class="btn btn-outline-primary page-mover rounded-circle d-flex align-items-center @empty($nextLesson) disabled @endempty">
                                    <i class="uil-arrow-right"></i>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-4">
                    <h3>Related Posts</h3>
                    <div class="card">
                        <div class="card-body" >
                            <div class="" style="height: 600px;overflow: scroll">
                                    @foreach($relatedPosts as $relatedPost)
                                        @if($relatedPost->header_image)
                                            <img style="height: 200px" class="w-100" src="{{asset('storage/header_image/'.$relatedPost->header_image)}}" alt="">
                                        @else
                                            <img style="height: 200px;" class="w-100" src="{{asset('frontend/assets/img/photo.jpg')}}" alt="">
                                        @endif
                                        <h6 class="m-0 mt-2">{{$relatedPost->excerpt_title}}</h6>
                                        <div class="d-flex justify-content-between">
                                            <small>{{$relatedPost->getUser->name}}</small>
                                            <small>{{$relatedPost->getGrade->title}} {{$relatedPost->getSubject->title}}</small>
                                        </div>
                                        <hr>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $('#imageGallery').lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                thumbItem: 9,
                slideMargin: 0,
                enableDrag: false,
                currentPagerPosition: 'left',
                onSliderLoad: function (el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
        });
    </script>
@endpush
