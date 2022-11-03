@extends('layouts.main.frontend')
@push('style')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
@endpush
@include('layouts.frontend.navbar')
@section('content')
    <div class="container-fluid">
        <div class="container">
            @include('layouts.frontend.lessons_control_navbar')
            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            {{--Header Image--}}
                            @if($lesson->header_image)
                                <div class="text-center mb-4">
                                    <img class="" src="{{asset('storage/header_image/'.$lesson->header_image)}}"
                                         alt="">
                                </div>
                            @endif

                            {{--Uploader Name & Image--}}
                            <div class="">
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
                            <p class="mt-3" style="text-align: justify;white-space: pre-wrap">{{$lesson->description}}</p>

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
                {{--Related Posts--}}
                <div class="col-lg-4">
                    <h3>Related Posts</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="swiper related_swiper">
                                <div class="swiper-wrapper">
                                    @foreach($relatedPosts as $relatedPost)
                                        <a href="{{route('frontend.lesson.show',$relatedPost->id)}}">
                                            <div class="swiper-slide">
                                                @if($relatedPost->header_image)
                                                    <img style="height: 200px" class="w-100"
                                                         src="{{asset('storage/header_image/'.$relatedPost->header_image)}}"
                                                         alt="">
                                                @else
                                                    <img style="height: 200px;" class="w-100"
                                                         src="{{asset('frontend/assets/img/photo.jpg')}}" alt="">
                                                @endif
                                                <a class="text-decoration-none"
                                                   href="{{route('frontend.lesson.show',$relatedPost->id)}}"><h6
                                                        class="m-0 mt-2">{{$relatedPost->excerpt_title}}</h6></a>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        @if($relatedPost->getUser->user_image)
                                                            <img style="width: 20px;border-radius: 50%" class="me-1"
                                                                 src="{{asset('storage/profile/'.$relatedPost->getUser->user_image)}}"
                                                                 alt="">
                                                        @else
                                                            <img style="width: 20px;border-radius: 50%" class="me-1"
                                                                 src="{{asset('dashboard/assets/img/user.png')}}"
                                                                 alt="">
                                                        @endif
                                                        <p class="m-0">{{$relatedPost->getUser->name}}</p>
                                                    </div>
                                                    <div>
                                                        <p class="m-0">{{$relatedPost->getGrade->title}}</p>
                                                        <p class="m-0"> {{$relatedPost->getSubject->title}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
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
    {{--swiper--}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        let swiper = new Swiper(".related_swiper", {
            pagination: {
                el: ".swiper-pagination",
                type: "fraction",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

@endpush
