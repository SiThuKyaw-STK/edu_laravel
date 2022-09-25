@extends('layouts.dashboard')

@section('content')
    <div class="row m-0">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0 h4">
                        <i class="uil-plus-circle text-secondary"></i>
                        Create Lesson
                    </h4>
                    <hr>
                    <form action="{{route('lesson.store')}}" method="post">
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
                            <label class="form-label">Lesson Title</label>
                            <input type="text" name="lesson_title" class="form-control @error('lesson_title') is-invalid @enderror">
                            @error("lesson_title")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lesson Description</label>
                            <textarea class="form-control @error('lesson_des') is-invalid @enderror" name="lesson_des" id="" cols="30" rows="10"></textarea>
                            @error("lesson_des")
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
