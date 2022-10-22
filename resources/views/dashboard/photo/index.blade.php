@extends('layouts.main.dashboard')

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">User Uploaded Photos</li>
    </x-bread-crumb>
<div class="row m-0">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="m-0 h4">
                    <i class="uil-picture text-secondary"></i>
                    Gallery
                </h4>
                <hr>

                <label for="" class="form-label">Header Image</label>
                <div class="gallery">
                    @forelse(\Illuminate\Support\Facades\Auth::user()->getHeaderImage as $photo)
                        @if(isset($photo->header_image))
                            <img src="{{asset('storage/header_image/'.$photo->header_image)}}" class=" mb-2 rounded" alt="">
                        @endif
                    @empty
                        <p>There is no photo yet!!!</p>
                    @endforelse
                </div>
                <hr>
                <label for="" class="form-label">Lesson Images</label>
                <div class="gallery">
                    @forelse(\Illuminate\Support\Facades\Auth::user()->getLessonImages as $photo)
                        <img src="{{asset('storage/lesson_image/'.$photo->name)}}" class=" mb-2 rounded" alt="">
                    @empty
                        <p>There is no photo yet!!!</p>
                    @endforelse
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
