@extends('layouts.main.frontend')
@push('style')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
@endpush
@section('content')
    <section class="container-fluid p-0 home"
             style="background-image: url('{{asset('frontend/assets/img/home.png')}}')">
        @extends('layouts.frontend.navbar')
        <div class="container d-flex align-items-center" style="min-height: 90vh">
            <div class="home__content text-center">
                <h1 class="text-primary fw-bolder">Education For Everyone</h1>
                <p class="text-white mt-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid
                    aperiam blanditiis commodi, doloremque ex in iusto modi, molestias mollitia officia pariatur qui
                    reiciendis sint veniam voluptates. Culpa cupiditate molestias odio?</p>
                <a href="{{route('frontend.lessons')}}" class="btn btn-primary fw-bold text-uppercase">Lessons</a>
            </div>
        </div>
    </section>
    <section class="about bg-black">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="">
                        <img src="{{asset('frontend/assets/img/about.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="">
                        <h4 class="text-primary text-uppercase fw-bold">About us</h4>
                        <h2 class="text-capitalize text-white fw-bold">experts to help your cross every hurdle</h2>
                        <p class="text-white text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Assumenda beatae doloribus eaque eos est ex expedita explicabo facere itaque minus nemo
                            neque, pariatur quia quis ut. Illo impedit odit voluptatem.
                            Assumenda beatae doloribus eaque eos est ex expedita explicabo facere itaque minus nemo
                            neque, pariatur quia quis ut. Illo impedit odit voluptatem.</p>
                        <a href="#" class="btn btn-primary text-uppercase fw-bold">contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials bg-secondary">
        <div class="container py-5">
            <div class="col-lg-8 m-auto">
                <h4 class="text-primary text-uppercase fw-bold">testimonials</h4>
                <div class="testimonials__swiper swiper">
                    <div class="swiper-wrapper">
                        <div class="text-center testimonials__content swiper-slide">
                            <p class="m-0 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur in incidunt
                                ipsam sint veniam
                                voluptatibus. Debitis delectus iure porro ratione recusandae sequi unde. Atque dolorem
                                doloribus eos,
                                quam quisquam suscipit.</p>
                            <div class="testimonials__user mt-3">
                                <img src="{{asset('frontend/assets/img/testimonials.png')}}" alt="">
                                <h4 class="text-white">Mrs.Akali</h4>
                                <p class="text-uppercase text-white-50">full stack web developer</p>
                            </div>
                        </div>
                        <div class="text-center testimonials__content swiper-slide">
                            <p class="m-0 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur in incidunt
                                ipsam sint veniam
                                voluptatibus. Debitis delectus iure porro ratione recusandae sequi unde. Atque dolorem
                                doloribus eos,
                                quam quisquam suscipit.</p>
                            <div class="testimonials__user mt-3">
                                <img src="{{asset('frontend/assets/img/testimonials.png')}}" alt="">
                                <h4 class="text-white">Mrs.Akali</h4>
                                <p class="text-uppercase text-white-50">full stack web developer</p>
                            </div>
                        </div>
                        <div class="text-center testimonials__content swiper-slide">
                            <p class="m-0 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur in incidunt
                                ipsam sint veniam
                                voluptatibus. Debitis delectus iure porro ratione recusandae sequi unde. Atque dolorem
                                doloribus eos,
                                quam quisquam suscipit.</p>
                            <div class="testimonials__user mt-3">
                                <img src="{{asset('frontend/assets/img/testimonials.png')}}" alt="">
                                <h4 class="text-white">Mrs.Akali</h4>
                                <p class="text-uppercase text-white-50">full stack web developer</p>
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="lessons bg-black">
        <div class="container">
            <div class="row">
                <h4 class="text-primary text-uppercase fw-bold mt-5">lessons</h4>
                @foreach($grades as $grade)
                <div class="col-lg-6">
                    <div class="lesson__card bg-warning text-center py-5 mb-5 rounded-2">
                        <h1>{{$grade->title}}</h1>
                        <p class="fw-bolder mt-3">Basic Education of Myanmar</p>
                        <a href="#" class="btn btn-dark mt-4">Learn {{$grade->title}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        let swiper = new Swiper(".testimonials__swiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endpush
