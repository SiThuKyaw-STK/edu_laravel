<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    @stack('style')
    @vite(['resources/sass/theme.scss', 'resources/js/theme.js'])
</head>
<body>
@yield('content')

@include('layouts.frontend.footer')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="{{asset('frontend/assets/js/theme.js')}}"></script>
@stack('script')

</body>
</html>
