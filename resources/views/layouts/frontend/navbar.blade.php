<nav id="navbar" class="navbar navbar-expand-lg bg-black frontend__navbar">
    <div class="container-fluid">
        <a class="navbar-brand text-primary" href="{{route('frontend.welcome')}}"><h1 class="m-0">Education</h1></a>
       <div class="menu d-block d-md-none" id="menu">
               <span class="line-1"></span>
               <span class="line-2"></span>
               <span class="line-3"></span>
       </div>
        <div  class="navbar-collapse nav__menu" id="nav-menu">
            <ul class="navbar-nav ms-auto mb-2 mb-md-0 ">
                <li id="nav-item" class="nav-item mx-2">
                    <h5 class="m-0"><a class="nav-link text-white text-uppercase" aria-current="page"
                                       href="#home">Home</a></h5>
                </li>
                <li id="nav-item" class="nav-item mx-2">
                    <h5 class="m-0"><a class="nav-link text-white text-uppercase" aria-current="page" href="#about">About</a>
                    </h5>
                </li>
                <li id="nav-item" class="nav-item mx-2">
                    <h5 class="m-0"><a class="nav-link text-white text-uppercase" aria-current="page"
                                       href="#testimonials">Testimonials</a>
                    </h5>
                </li>
                <li id="nav-item" class="nav-item mx-2">
                    <h5 class="m-0"><a class="nav-link text-white text-uppercase" aria-current="page"
                                       href="#lessons">Lessons</a></h5>
                </li>
            </ul>
            @auth
                <a href="{{ route('login') }}"
                   class="btn btn-primary text-black text-uppercase fw-bolder css-prop-demo mb-3 m-md-0">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary text-black text-uppercase fw-bolder mb-3 m-md-0">Login</a>
            @endauth
        </div>
    </div>
</nav>
