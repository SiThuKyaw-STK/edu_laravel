@extends('layouts.main.app')
@push('style')
    <style>
        .login__right,.login__left{
            min-height: 100vh;
        }
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
        @media screen and (max-width: 767px){
            .login__left,.login__right{
                min-height: 55vh !important;
            }
            .login__card {
                padding-top: 40%;
                padding-right: 30px;
                padding-left: 30px;
            }
            .login__content1, .login__content3 {
                padding: 0;
            }
            .login__content2{
                width: 100% ;
                padding: 0;
                margin: 0;
            }
            .login__content3{
                width: 100%;
            }
        }
        @media screen and (min-width: 767px) and (max-width: 1023px){
            .login__left,.login__right{
                min-height: 50vh !important;
            }
            .login__card{
                padding-top: 30% !important;
                padding-left: 200px !important;
                padding-right: 200px !important;
            }
            .login__content2{
                width: 100% !important;
                padding-top: 60px;
            }
            .login__content3{
                width: 100%;
            }
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="login__left col-lg-7 col-12 bg-secondary d-flex d-md-block align-items-center">
                <div>
                    <div class="login__content1">
                        <h3 class="text-primary fw-bolder text-uppercase">education</h3>
                    </div>
                    <div class="login__content2 mt-5">
                        <h1 class="">WELCOME TO EDUCATION ON THE WEB</h1>
                    </div>
                    <div class="login__content3">
                        <h5 class="text-white-50">Access your logins and personal data in the web app ??? quickly and
                            securely.</h5>
                    </div>
                </div>
            </div>
            <div class="login__right col-lg-5 col-12">
                <div>
                    <div class="float-end pt-5 d-flex align-items-center">
                        <a href="{{route('login')}}" class="">already have account?</a>
                    </div>

                    <div class="login__card">
                        <h3 class="text-capitalize">register here</h3>
                        <div class="">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">

                                    <div class="">
                                        <input id="name" type="text" placeholder="Name"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">

                                    <div class="">
                                        <input id="email" type="email" placeholder="Email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">

                                    <div class="">
                                        <input id="password" type="password" placeholder="Password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">

                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class=" mb-0">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
