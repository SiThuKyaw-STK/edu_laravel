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
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            {{--Header Image--}}
                            <div class="text-center">
                                @if($lesson->header_image)
                                    <img class="" src="{{asset('storage/header_image/'.$lesson->header_image)}}"
                                         alt="">
                                @endif
                            </div>

                            {{--User Image--}}
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
                            <ul id="imageGallery" class="text-center">
                                @foreach($lesson->getLessonImages as $image)
                                    <li data-src="{{asset('storage/lesson_image/'.$image->name)}}" data-thumb="{{asset('storage/lesson_image/'.$image->name)}}">
                                        <img style="object-fit: contain;height: 300px" class="w-100" src="{{asset('storage/lesson_image/'.$image->name)}}" alt="">
                                    </li>
                                @endforeach
                            </ul>
{{--                            <ul id="imageGallery">--}}
{{--                                <li data-thumb="img/thumb/cS-1.jpg" data-src="img/largeImage.jpg">--}}
{{--                                    <img src="img/cS-1.jpg" />--}}
{{--                                </li>--}}
{{--                                <li data-thumb="img/thumb/cS-2.jpg" data-src="img/largeImage1.jpg">--}}
{{--                                    <img src="img/cS-2.jpg" />--}}
{{--                                </li>--}}
{{--                            </ul>--}}
                            {{--Lesson Description--}}
                            <p class="mt-3" style="text-align: justify">{{$lesson->description}}</p>
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
