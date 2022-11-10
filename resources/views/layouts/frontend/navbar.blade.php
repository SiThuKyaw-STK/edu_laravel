<nav id="navbar" class="navbar navbar-expand-lg bg-black frontend__navbar">
    <div class="container-fluid">
        <a class="navbar-brand text-primary" href="{{route('frontend.welcome')}}"><h1 class="m-0">Education</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav__menu" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                <li class="nav-item mx-2">
                    <h5 class="m-0"><a class="nav-link text-white text-uppercase" aria-current="page"
                                       href="#home">Home</a></h5>
                </li>
                <li class="nav-item mx-2">
                    <h5 class="m-0"><a class="nav-link text-white text-uppercase" aria-current="page" href="#about">About</a>
                    </h5>
                </li>
                <li class="nav-item mx-2">
                    <h5 class="m-0"><a class="nav-link text-white text-uppercase" aria-current="page"
                                       href="#testimonials">Testimonials</a>
                    </h5>
                </li>
                <li class="nav-item mx-2">
                    <h5 class="m-0"><a class="nav-link text-white text-uppercase" aria-current="page"
                                       href="#lessons">Lessons</a></h5>
                </li>
            </ul>
            @auth
                <a href="{{ route('login') }}"
                   class="btn btn-primary text-black text-uppercase fw-bolder css-prop-demo">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary text-black text-uppercase fw-bolder">Login</a>
            @endauth
        </div>
    </div>
</nav>
