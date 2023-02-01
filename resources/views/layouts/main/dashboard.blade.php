<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/style.css')}}">
    {{--Summernote Editor--}}
    <script src="https://cdn.tiny.cloud/1/qu3tsxlx0x0971qpr787e0obfq325ah2b7amz022awjycvyh/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

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
    document.addEventListener('DOMContentLoaded', function () {
        showToast("{{session('status')}}")
    })
    @endif
</script>

<script>
    tinymce.init({
        selector: 'textarea.wysiwyg',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            {value: 'First.Name', title: 'First Name'},
            {value: 'Email', title: 'Email'},
        ]
    });
</script>

</body>
</html>
