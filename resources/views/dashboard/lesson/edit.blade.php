@extends('layouts.main.dashboard')

@section('content')
<div class="row m-0">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="m-0 h4">
                    <i class="uil-edit-alt text-secondary"></i>
                    Edit Section
                </h4>
                <hr>
                <form action="{{route('lesson.update',$lesson->id)}}" id="postUpdateForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                </form>
                    <div class="mb-3">
                        <label class="form-label">Select Grade</label>
                        <select form="postUpdateForm" type="text" name="grade" id="grade" class="form-select @error('grade') is-invalid @enderror">
                            <option value="-1">Grade</option>
                            @forelse($grades as $grade)
                                <option
                                    value="{{$grade->id}}"
                                    {{ $grade->id == old('grade',$lesson->grade_id) ? 'selected':'' }}>
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
                        <select form="postUpdateForm" type="text" name="subject" id="subject" class="form-select @error('subject') is-invalid @enderror">
                            <option >Subject</option>
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
                            form="postUpdateForm"
                            name="header_image">
                        @error('header_image')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                       @if(isset($lesson->header_image))
                            <img class="edit_header_image" src="{{asset('storage/header_image/'.$lesson->header_image)}}" alt="">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lesson Title</label>
                        <input
                            type="text"
                            value="{{old('lesson_title',$lesson->title)}}"}}
                            name="lesson_title"
                            form="postUpdateForm"
                            class="form-control
                            @error('lesson_title') is-invalid @enderror">
                        @error("lesson_title")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="lesson_images">Lesson Images</label>
                            <input
                                type="file"
                                multiple
                                class="form-control @error('lesson_images.*') is-invalid @enderror"
                                id="lesson_images"
                                form="postUpdateForm"
                                name="lesson_images[]">
                            @error('lesson_images.*')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            @foreach($lesson->getLessonImages as $photo)
                                <div class="d-inline-block position-relative mt-1">
                                    <img class="lesson_image" src="{{asset('storage/lesson_image/'.$photo->name)}}" alt="">
                                    <form class="d-inline-block" action="{{route('photo.destroy',$photo->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger position-absolute bottom-0 end-0"><i class="uil-trash-alt"></i></button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lesson Description</label>
                        <textarea
                            class="form-control
                            @error('lesson_description') is-invalid @enderror"
                            name="lesson_description"
                            form="postUpdateForm"
                            id=""
                            cols="30"
                            rows="10">{{old('lesson_description',$lesson->description)}}</textarea>

                        @error("lesson_description")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button form="postUpdateForm" type="submit" class="btn btn-secondary float-end">Update Post</button>
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
                    $('select[name="subject"]').append('<option>Subject</option>');
                }



            })
        })
       let clickGrade =setInterval(function () {
            let grade = $('#grade');
            grade.click()
        },500)
        setTimeout(function () {
            clearInterval(clickGrade)
        },1000)
    </script>
@endpush
