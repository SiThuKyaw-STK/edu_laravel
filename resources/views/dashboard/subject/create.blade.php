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
                    <form action="{{route('subject.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label">Select Grade</label>
                                <select type="text" name="grade" id="grade" class="form-select @error('grade') is-invalid @enderror">
                                    @forelse($grades as $grade)
                                        <option
                                            value="{{$grade->id}}"
                                            {{ $grade->id == old('grade') ? 'selected':'' }}>
                                            {{$grade->title}}
                                        </option>
                                    @empty
                                        <option value="">There is no data</option>
                                    @endforelse
                                </select>
                                @error("grade")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="">
                                    <label class="form-label">Title</label>
                                    <input
                                        type="text"
                                        value="{{old('subject_title')}}"
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
                        <button type="submit" class="btn btn-secondary float-end">Add</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
