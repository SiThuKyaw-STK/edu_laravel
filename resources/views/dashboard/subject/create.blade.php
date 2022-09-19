@extends('layouts.dashboard')

@section('content')
    <div class="row m-0">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0 h4">
                        <i class="uil-file-plus-alt text-secondary"></i>
                        Create Subject
                    </h4>
                    <hr>
                    <form action="">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Select Grade</label>
                                <select class="form-select">
                                    @forelse($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->title}}</option>
                                    @empty
                                        <option value="">There is no data</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-6">
                                <div class="">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="subject_title" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-secondary float-end">Add</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
