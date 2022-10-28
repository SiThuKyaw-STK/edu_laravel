@extends('layouts.main.frontend')

@section('content')
    <section class="container-fluid p-0 home" style="background-image: url('{{asset('frontend/assets/img/home.png')}}')">
        @extends('layouts.frontend.navbar')
       <div class="container d-flex align-items-center" style="min-height: 90vh">
           <div class="home__content text-center">
               <h1 class="text-primary fw-bolder">Education For Everyone</h1>
               <p class="text-white mt-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aperiam blanditiis commodi, doloremque ex in iusto modi, molestias mollitia officia pariatur qui reiciendis sint veniam voluptates. Culpa cupiditate molestias odio?</p>
               <a href="#" class="btn btn-primary fw-bold text-uppercase">Lessons</a>
           </div>
       </div>
    </section>
    <section class="min-vh-100"></section>
@endsection
