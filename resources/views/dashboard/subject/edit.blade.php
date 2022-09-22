@extends('layouts.dashboard')

@section('content')
    <div class="row m-0">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>Edit {{$subject->grade->title}}'s {{$subject->title}}</h4>
                    <hr>
                    <form action="{{route('subject.update',$subject->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-6">
                                <div class="">
                                    <label class="form-label">Grade</label>
                                    <input type="text" value="{{$subject->grade->title}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="">
                                    <label class="form-label">Edit Subject</label>
                                    <input
                                        type="text"
                                        value="{{old('subject_title',$subject->title)}}"
                                        name="subject_title"
                                        id="subject_title"
                                        class="form-control @error('subject_title') is-invalid @enderror"
                                    >
                                    @error("subject_title")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-secondary float-end">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
