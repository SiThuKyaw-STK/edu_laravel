@extends('layouts.main.dashboard')

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Create Lesson</li>
    </x-bread-crumb>
    <div class="row m-0">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0 h4">
                        <i class="uil-plus-circle text-secondary"></i>
                        Create Lesson
                    </h4>
                    <hr>
                    <form action="{{route('lesson.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Select Grade</label>
                            <select type="text" name="grade" id="grade" class="form-select @error('grade') is-invalid @enderror">
                                <option value="-1">Grade</option>
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
                        <div class="mb-3">
                            <label class="form-label">Select Subject</label>
                            <select type="text" name="subject" id="subject" class="form-select @error('subject') is-invalid @enderror">

                            </select>
                            @error("subject")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="header_image">Header Image</label>
                            <input
                                type="file"
                                class="form-control @error('header_image') is-invalid @enderror"
                                id="header_image"
                                name="header_image">
                            @error('header_image')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lesson Title</label>
                            <input value="{{old('lesson_title')}}" type="text" name="lesson_title" class="form-control @error('lesson_title') is-invalid @enderror">
                            @error("lesson_title")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lesson_images">Lesson Images</label>
                            <input
                                type="file"
                                multiple
                                class="form-control @error('lesson_images.*') is-invalid @enderror"
                                id="lesson_images"
                                name="lesson_images[]">
                            @error('lesson_images.*')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lesson Description</label>
                            <textarea class="form-control @error('lesson_description') is-invalid @enderror" name="lesson_description" id="" cols="30" rows="10">{{old('lesson_description')}}</textarea>
                            @error("lesson_description")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-secondary">Add Post</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('select[name="grade"]').on('click',function () {
                let gradeID = $(this).val();
                if (gradeID != -1){
                    $.ajax({
                        url:'/getSubjects/' + gradeID,
                        type: "GET",
                        dataType : "json",
                        success : function (data) {
                            $('select[name="subject"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="subject"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    });
                }else  {
                    $('select[name="subject"]').empty();
                    $('select[name="subject"]').append('<option >Subject</option>');
                }

            })
        })
        let clickGrade =setInterval(function () {
            let grade = $('#grade');
            grade.click()
        },200)
        setTimeout(function () {
            clearInterval(clickGrade)
        },500)

    </script>
@endpush
