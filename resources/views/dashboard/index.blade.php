@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h4>
                        Hello Welcome <span class="fw-bolder">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
