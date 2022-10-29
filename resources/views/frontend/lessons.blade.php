@extends('layouts.main.frontend')
@include('layouts.frontend.navbar')
@section('content')
<div class="container-fluid ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between py-2">
                    <select class="form-select w-25" aria-label=".form-select-sm example">
                        <option selected>Select Grade</option>
                        @foreach($grades as $grade)
                            <option value="{{$grade->id}}">{{$grade->title}}</option>
                        @endforeach
                    </select>
                    <form class="input-group w-25" role="search">
                        <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit"><i class="uil-search-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($lessons as $lesson)
                <div class="col-lg-3 mt-3">
                    <div class="">
                        <div class="card h-100">
                            <img src="{{asset('storage/header_image/'.$lesson->header_image)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title fw-bolder">{{$lesson->title}}</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary float-end">learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="my-5" id="pagination">
            {{$lessons->onEachSide(1)->links()}}
        </div>
    </div>
</div>

@endsection
