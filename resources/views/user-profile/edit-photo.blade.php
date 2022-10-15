@extends('layouts.main.dashboard')
@section('content')
    <div class="row m-0">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ isset(Auth::user()->user_image) ? asset('storage/profile/'.Auth::user()->user_image) : asset('dashboard/assets/img/user.png') }}" class="d-block w-50 mx-auto rounded-circle my-3" alt="">

                    <form action="{{ route('user-profile.changePhoto') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="d-flex justify-content-between align-items-end">
                            <div class="form-group mb-0 mr-2">
                                <label class="text-center">
                                    <i class="mr-1 feather-image"></i>
                                    Select New Photo
                                </label>
                                <input type="file" name="photo" class="form-control p-1 mr-2 overflow-hidden" required>

                            </div>
                            <button type="submit" class="btn btn-sm btn-secondary">
                                <i class="mr-1 uil-upload"></i>
                            </button>
                        </div>
                        @error("photo")
                        <small class="font-weight-bold text-danger text-center">{{ $message }}</small>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
