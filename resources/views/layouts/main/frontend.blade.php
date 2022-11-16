<!doctype html>
<html lang="en">
<head>
    <!-- Primary Meta Tags -->
    <title>Education For Everyone</title>
    <meta name="title" content="Education For Everyone">
    <meta name="description" content="သူငယ်တန်းမှဆယ်တန်းအထိ သင်ရိုးများစုံစုံလင်လင် တစ်နေရာထဲတွင် လေ့လာနိုင်ပါပီ။">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{asset('')}}">
    <meta property="og:title" content="Education For Everyone">
    <meta property="og:description" content="သူငယ်တန်းမှဆယ်တန်းအထိ သင်ရိုးများစုံစုံလင်လင် တစ်နေရာထဲတွင် လေ့လာနိုင်ပါပီ။">
    <meta property="og:image" content="{{asset('frontend/assets/img/for_meta.png')}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{asset('')}}">
    <meta property="twitter:title" content="Education For Everyone">
    <meta property="twitter:description" content="သူငယ်တန်းမှဆယ်တန်းအထိ သင်ရိုးများစုံစုံလင်လင် တစ်နေရာထဲတွင် လေ့လာနိုင်ပါပီ။">
    <meta property="twitter:image" content="{{asset('frontend/assets/img/for_meta.png')}}">

    <link rel="shortcut icon" href="{{asset('frontend/assets/img/for_meta_logo.png')}}">

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
