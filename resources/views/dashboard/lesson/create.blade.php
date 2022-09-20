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
                    <form >
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Select Grade</label>
                            <select class="form-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Subject</label>
                            <select class="form-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lesson Title</label>
                            <input type="text" name="lesson_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lesson Description</label>
                            <textarea class="form-control" name="lesson_des" id="" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary">Add Post</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
