@extends('layouts.main.app')
@push('style')
    <style>
        .login__content1, .login__content3 {
            padding-right: 80px;
            padding-left: 80px;
            padding-top: 80px;
        }

        .login__content2 {
            width: 66%;
            color: #fafafa;
            font-weight: bolder;
            padding-top: 200px;
            padding-right: 80px;
            padding-left: 80px;
            margin-bottom: 20px;
        }

        .login__content3 {
            width: 60%;
            padding-top: 0px;
        }

        .login__card {
            padding-top: 50%;
            padding-right: 80px;
            padding-left: 80px;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-7 bg-secondary min-vh-100">
                <div class="login__content1">
                    <h3 class="text-primary fw-bolder text-uppercase">education</h3>
                </div>
                <div class="login__content2">
                    <h1 class="">WELCOME TO EDUCATION ON THE WEB</h1>
                </div>
                <div class="login__content3">
                    <h5 class="text-white-50">Access your logins and personal data in the web app — quickly and
                        securely.</h5>
                </div>
            </div>
            <div class="col-5 min-vh-100">
                <div>
                    <div class="float-end pt-5 d-flex align-items-center">
                        <h6 class="m-0 d-inline-block me-2 text-black-50">New User ?</h6>
                        <a href="{{route('register')}}" class="btn btn-secondary text-uppercase">get started now</a>
                    </div>

                    <div class="login__card">
                        <h3 class="text-capitalize">log in to education</h3>
                        <div class="">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <input id="email" type="email" placeholder="Email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input id="password" type="password" placeholder="Password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                               <div class="text-center">
                                   @if (Route::has('password.request'))
                                       <a class="btn btn-link" href="{{ route('password.request') }}">
                                           {{ __('Forgot Your Password?') }}
                                       </a>
                                   @endif
                               </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
