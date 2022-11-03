<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/style.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>


    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">

        <!--side bar start-->
    @include('layouts.dashboard.sidebar')
    <!--side bar end-->

        <!--main start-->
        <main class="col-10 flex-fill min-vh-100">
            {{--navbar start--}}
            @include('layouts.dashboard.navbar')
            {{--navbar end--}}

            @yield('content')

        </main>
        <!--main start-->

    </div>
</div>

<script src="{{asset('dashboard/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/app.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('script')
    <script>
        @if(session('status'))
            document.addEventListener('DOMContentLoaded',function () {
            showToast("{{session('status')}}")
            })
        @endif
    </script>
</body>
</html>
