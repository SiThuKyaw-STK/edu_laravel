@extends('layouts.main.frontend')
@push('title')<title>Education</title>@endpush
@push('style')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
@endpush
@section('content')
    @include('layouts.frontend.navbar')

    <section id="home" class="container-fluid p-0 home"
             style="background-image: url('{{asset('frontend/assets/img/home.png')}}')">
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
    <section id="about" class="about bg-black">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="about__img">
                        <img class="w-100" src="{{asset('frontend/assets/img/about.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__content">
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
    <section id="testimonials" class="testimonials bg-secondary">
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
    <section id="lessons" class="lessons bg-black">
        <div class="container">
            <div class="row">
                <h4 class="text-primary text-uppercase fw-bold mt-5">lessons</h4>
                @foreach($grades as $grade)
                <div class="col-md-6">
                    <div class="lesson__card bg-warning text-center py-5 mb-5 rounded-2">
                        <h1>{{$grade->title}}</h1>
                        <p class="fw-bolder mt-3">Basic Education of Myanmar</p>
                        <a href="{{route('frontend.lessonByGrade',$grade->id)}}" class="btn btn-dark mt-4">Learn {{$grade->title}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('script')
    <!-- Initialize Swiper -->
    <script>
        let swiper = new Swiper(".testimonials__swiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    {{--ScrollRevela--}}
    <script>
        const sr = ScrollReveal({});
        //home
        sr.reveal('.home__content h1',{
            duration : 2000,
            easing   : 'ease-in-out',
            distance : "30px"
        });
        sr.reveal('.home__content p',{
            duration : 2000,
            delay : 1000,
            easing   : 'ease-in-out',
            distance : "30px"
        });
        sr.reveal('.home__content a',{
            duration : 2000,
            delay : 1000,
            easing   : 'ease-out',
            distance : "60px",
        });
        //about
        sr.reveal('.about__content',{
            origin : 'right',
            distance: '60px',
            duration: 2500,
            delay: 400,
        });
        sr.reveal('.about__img',{
            origin : 'left',
            distance: '60px',
            duration: 2500,
            delay: 400,
        })
        //lessons
        sr.reveal('.lesson__card',{
            duration : 2000,
            interval : 200
        });
        sr.reveal('.lesson__card h1',{
            duration: 1000,
            delay : 200,
            distance : '50px',
            origin : 'bottom'
        });

    </script>

    {{--Navbar--}}
    <script>
        /*==================== SCROLL SECTIONS ACTIVE LINK ====================*/
        const sections = document.querySelectorAll('section[id]')

        function scrollActive(){
            const scrollY = window.pageYOffset

            sections.forEach(current =>{
                const sectionHeight = current.offsetHeight
                const sectionTop = current.offsetTop - 100;
                sectionId = current.getAttribute('id')

                if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
                    document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active-link')
                }else{
                    document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active-link')
                }
            })
        }
        window.addEventListener('scroll', scrollActive)

        /*=============== CHANGE BACKGROUND NAVBAR ===============*/
        function scrollHeader() {
            const navbar = document.getElementById('navbar')
            // When the scroll is greater than 50 viewport height, add the scroll-navbar class to the navbar tag
            if (this.scrollY >= 50) navbar.classList.add('scroll-header'); else navbar.classList.remove('scroll-header')
        }
        window.addEventListener('scroll', scrollHeader)

        // hamburger menu
        let menu = document.getElementById('menu');
        let nav_menu = document.getElementById('nav-menu');
        const nav_items = document.querySelectorAll("#nav-item");

        menu.onclick= function (){
            menu.classList.toggle("openmeun");
            nav_menu.classList.toggle("nav__menu-open");
        }
        for (const nav_item of nav_items){
            nav_item.addEventListener('click',function (){
                nav_menu.classList.remove("nav__menu-open");
                menu.classList.remove("openmeun");
            })
        }

    </script>
@endpush
