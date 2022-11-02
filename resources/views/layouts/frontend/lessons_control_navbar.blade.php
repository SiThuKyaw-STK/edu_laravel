<div class="row mt-2" style="border: 0.1px solid #00A48750;border-radius: 10px">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between py-2 align-items-center">
            <div class="d-flex align-items-center">
                <div class="nav-item dropdown me-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Search By Grade
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('frontend.lessons')}}">All</a></li>
                        @foreach($grades as $grade)
                            <li value="{{$grade->id}}"><a class="dropdown-item"
                                                          href="{{route('frontend.lessonByGrade',$grade->id)}}">{{$grade->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Search By Uploader
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('frontend.lessons')}}">All</a></li>
                        @foreach($users as $user)
                            <li value="{{$user->id}}">
                                <a class="dropdown-item" href="{{route('frontend.lessonByUploader',$user->id)}}">
                                   @if($user->user_image)
                                        <img style="width: 30px;border-radius: 50%;margin-right: 5px" src="{{asset('storage/profile/'.$user->user_image)}}" alt="">
                                    @else
                                        <img style="width: 30px;border-radius: 50%;margin-right: 5px" src="{{asset('dashboard/assets/img/user.png')}}" alt="">
                                    @endif
                                    {{$user->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <form class="input-group w-25" role="search">
                <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit"><i class="uil-search-alt"></i></button>
            </form>
        </div>
    </div>
</div>
