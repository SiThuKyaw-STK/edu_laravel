@extends('layouts.main.frontend')
@section('content')
<div class="container-fluid ">
    <div class="container">
        @include('layouts.frontend.lessons_control_navbar')
       <div class="d-flex justify-content-between align-items-center mt-2">
           <x-frontend-bread-crumb>
               <li class="breadcrumb-item active" aria-current="page">Lessons</li>
           </x-frontend-bread-crumb>
           @auth
               <a href="{{ route('home') }}" class="btn btn-sm text-white btn-primary">Dashboard</a>
           @endauth
       </div>
        <div class="row">
            @forelse($lessons as $lesson)
                <div class="col-lg-3 col-md-6 col-12 mt-3">
                    <div class="lesson__card">
                        <div class="card">
                            @if($lesson->header_image)
                                <img style="height: 200px" src="{{asset('storage/header_image/'.$lesson->header_image)}}" class="card-img-top" alt="...">
                            @else
                                <img style="height: 200px" src="{{asset('frontend/assets/img/photo.jpg')}}" alt="">
                            @endif
                            <div class="card-body">
                                <small class="card-owner">written: <span class="text-info fw-bolder">{{$lesson->getUser->name}}</span></small>
                                <h6 class="card-title fw-bolder mt-3">{{$lesson->excerpt_title}}</h6>
                                <p class="card-text">{{$lesson->excerpt}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-grid">
                                        <small class="m-0 fw-bold text-info">{{$lesson->getGrade->title}}</small>
                                        <small class="m-0 fw-bold text-info">{{$lesson->getSubject->title}}</small>
                                    </div>
                                    <a href="{{route('frontend.lesson.show',$lesson->id)}}" class="btn btn-outline-primary">learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center mt-5">

                        <h1 class="text-danger">Sorry There Is No Data!</h1>
                        <h2 class="text-primary">We Will Be Uploading Soon.</h2>

                </div>
            @endforelse
        </div>
        <div class="my-5" id="pagination">
            {{$lessons->onEachSide(1)->links()}}
        </div>
    </div>
</div>
@endsection
@push('script')
{{--Scrollreveal--}}
<script>
    const sr = ScrollReveal();

    sr.reveal('.lesson__card',{
        duration : 1000,
        interval : 200
    });
</script>
{{--light mode dark mode--}}
<script>
    /*=============== LIGHT DARK THEME ===============*/
    const themeButton = document.getElementById('theme-button')
    const darkTheme = 'dark-theme'
    const iconTheme = 'uil-sun'

    // Previously selected topic (if user selected)
    const selectedTheme = localStorage.getItem('selected-theme')
    const selectedIcon = localStorage.getItem('selected-icon')

    // We obtain the current theme that the interface has by validating the light-theme class
    const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'light' : 'dark'
    const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'uil uil-moon' : 'uil uil-sun'

    // We validate if the user previously chose a topic
    if (selectedTheme) {
        // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the light
        document.body.classList[selectedTheme === 'light' ? 'add' : 'remove'](darkTheme)
        themeButton.classList[selectedIcon === 'uil-moon' ? 'add' : 'remove'](iconTheme)
    }

    // Activate / deactivate the theme manually with the button
    themeButton.addEventListener('click', () => {
        // Add or remove the light / icon theme
        document.body.classList.toggle(darkTheme)
        themeButton.classList.toggle(iconTheme)
        // We save the theme and the current icon that the user chose
        localStorage.setItem('selected-theme', getCurrentTheme())
        localStorage.setItem('selected-icon', getCurrentIcon())
    })
</script>
@endpush
