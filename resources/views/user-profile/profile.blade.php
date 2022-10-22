@extends('layouts.main.dashboard')
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </x-bread-crumb>
    <div class="row m-0">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <img src="{{ isset(Auth::user()->user_image) ? asset('storage/profile/'.Auth::user()->user_image) : asset('dashboard/assets/img/user.png') }}" class="d-block w-50 mx-auto rounded-circle my-3" alt="">
                    </div>
                    <div class="text-center">
                        <h3>{{Auth::user()->name}}</h3>
                        @if(Auth::user()->role == 0)
                            <h5>Admin</h5>
                        @elseif(Auth::user()->role == 1)
                            <h5>Editor</h5>
                        @else
                            <h5>User</h5>
                        @endif
                        <p>{{Auth::user()->email}}</p>
                    </div>
                    <div>
                        <a href="{{route('user-profile.editPhoto')}}" class="btn btn-sm btn-secondary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
