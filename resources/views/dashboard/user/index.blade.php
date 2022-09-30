@extends('layouts.dashboard')
@section('content')
    <div class="row m-0">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i class="uil-users-alt text-secondary"></i>
                        Users List
                    </h4>
                    <hr>

                    <table id="d-table-user" class="display hover cell-border nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>IsBaned</th>
                            <th>Control</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->role == 0)
                                        Admin
                                    @elseif($user->role == 1)
                                        Editor
                                    @else
                                        User
                                    @endif
                                </td>
                                <td>
                                    @if($user->isBaned == 0)
                                        <span class="badge text-bg-danger fw-light">Baned</span>
                                        <form class="d-inline-block" action="{{route('user.restore')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button class="btn btn-sm btn-success">Restore</button>
                                        </form>
                                    @else
                                        <form class="d-inline-block" action="{{route('user.ban')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button class="btn btn-sm btn-danger">Ban</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if($user->role == 2)
                                    <form class="d-inline-block" action="{{route('user.makeEditor')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <button class="btn btn-sm btn-info">Make Editor</button>
                                    </form>

                                    @elseif($user->role == 1)
                                        <form action="{{route('user.makeUser')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button class="btn btn-sm btn-warning">Make User</button>
                                        </form>
                                    @endif
                                </td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
