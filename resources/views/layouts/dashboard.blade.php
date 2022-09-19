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
            <div class="row m-0">
                <div class="p-3">
                    <nav aria-label="breadcrumb" class="p-3 rounded rounded-3" style="background: #00000010">
                        <ol class="breadcrumb bg-transparent m-0">
                            <li class="breadcrumb-item fw-bolder"><a href="#" class="text-secondary">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Articles List</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @yield('content')

        </main>
        <!--main start-->

    </div>
</div>

<script src="{{asset('dashboard/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/app.js')}}"></script>
</body>
</html>
