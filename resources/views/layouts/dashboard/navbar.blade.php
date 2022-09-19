<nav class="navbar navbar-light bg-light shadow-sm p-2">
    <div class="d-flex align-items-center">
        <i class="feather-menu d-block d-md-none show__mobile__sidebar"></i>
        <div class="hamburger not-active me-3 d-none d-md-block">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <form class="d-none d-md-block">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search everything" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <button class="btn btn-sm btn-secondary"><i class="uil-search-alt"></i></button>
            </div>
        </form>
    </div>
    <div class="user__info">
        <img src="assets/img/user1.jpg" alt="">
        <span class="d-inline-flex align-items-center">
            {{\Illuminate\Support\Facades\Auth::user()->name}}
            <i class="feather-chevron-down fw-bolder ms-2"></i>
        </span>
        <ul class="shadow-sm">
            <li><a href="#"><i class="feather-user me-1"></i> Profile</a></li>
            <li><a href="#" class="d-flex align-items-center"><i class="feather-clock me-2"></i>Analytics</a></li>
            <hr style="margin: .5rem">
            <li><a href="#" class="d-flex align-items-center"><i class="feather-settings me-2"></i>Setting & Privacy</a></li>
            <li><a href="#" class="d-flex align-items-center"><i class="feather-log-out me-2"></i>Log Out</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    <i class="feather-log-out me-2"></i>
                    {{ __('Log Out') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form></li>
        </ul>
    </div>
</nav>
