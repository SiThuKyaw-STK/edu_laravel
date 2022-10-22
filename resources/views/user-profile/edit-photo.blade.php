@extends('layouts.main.dashboard')
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item fw-bolder" aria-current="page"><a class="text-secondary" href="{{route('user-profile.profile')}}">Profile</a></li>
        <li class="breadcrumb-item active">Edit Profile</li>
    </x-bread-crumb>
    <div class="row m-0">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ isset(Auth::user()->user_image) ? asset('storage/profile/'.Auth::user()->user_image) : asset('dashboard/assets/img/user.png') }}" class="d-block w-50 mx-auto rounded-circle my-3" alt="">

                    <form action="{{ route('user-profile.changePhoto') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="d-flex justify-content-between align-items-end">
                            <div class="form-group mb-0 mr-2">
                                <label class="text-center">
                                    <i class="mr-1 feather-image"></i>
                                    Select New Photo
                                </label>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input type="file" name="photo" class="form-control p-1 mr-2 overflow-hidden" >
                                    <button type="submit" class="btn btn-sm btn-secondary ms-1">
                                        <i class="mr-1 uil-upload"></i>
                                    </button>
                                </div>

                            </div>

                        </div>
                        @error("photo")
                        <small class="font-weight-bold text-danger text-center">{{ $message }}</small>
                        @enderror
                    </form>

                    <form action="{{route('user-profile.changeName')}}" method="post" class="my-2">
                        @csrf
                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-user"></i>
                                Your Name
                            </label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                            @error("name")
                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                                <label class="custom-control-label" for="customSwitch1">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-sm btn-secondary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Name
                            </button>
                        </div>
                    </form>

                    <form action="{{ route('user-profile.changeEmail') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-mail"></i>
                                Your Email
                            </label>
                            <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                            @error("email")
                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" required>
                                <label class="custom-control-label" for="customSwitch3">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-sm btn-secondary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Email
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
