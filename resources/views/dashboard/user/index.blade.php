@extends('layouts.main.dashboard')
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </x-bread-crumb>
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
                                        <span class="badge text-bg-danger fw-light">Banned</span>
                                        <form class="d-inline-block" action="{{route('user.restore')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button class="btn btn-sm btn-success show-alert-restore-box">Restore</button>
                                        </form>
                                    @elseif($user->role == 0)
                                        <button class="btn btn-secondary" disabled>This is an admin</button>
                                    @else
                                        <form class="d-inline-block" action="{{route('user.ban')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button class="btn btn-sm btn-danger show-alert-ban-box">Ban This User!!!</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if($user->role == 2)
                                    <form class="d-inline-block" action="{{route('user.makeEditor')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <button class="btn btn-sm btn-info show-alert-makeEditor-box">Make Editor</button>
                                    </form>

                                    @elseif($user->role == 1)
                                        <form action="{{route('user.makeUser')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button class="btn btn-sm btn-warning show-alert-makeUser-box">Make User</button>
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
@push('script')
    <script>
        $('.show-alert-ban-box').click(function(event){
            let form =  $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure to ban this user?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
        $('.show-alert-restore-box').click(function(event){
            let form =  $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure to restore this user?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
        $('.show-alert-makeEditor-box').click(function(event){
            let form =  $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure to upgrade Editor role for this user?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
        $('.show-alert-makeUser-box').click(function(event){
            let form =  $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure to downgrade User role for this user?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
@endpush
