@extends('xyz-1/layouts/main')

@section('main')
    <div class="conainer mt-5 p-5">
        <div class="card bg-primary-subtle p-5">
            <div class="text-center">
                <h1>Data User</h1>
                @if (session()->has('userUndifined'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('userUndifined') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                @endif
                @if (session()->has('deleteSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('deleteSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                @endif

                <div class="mt-5">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped table-primary">
                            <tr>
                                <td>No</td>
                                <td>Name</td>
                                <td>Username</td>
                                <td>Position</td>
                                @if (Auth::user()->role == 2)
                                    <td>Action</td>
                                @endif
                            </tr>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data['user'] as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['username'] }}</td>
                                    <td>{{ $user['position'] }}</td>
                                    @if (Auth::user()->role == 2)
                                        <td>
                                            @if ($user['username'] !== Auth::user()->username)
                                                <a class="btn btn-outline-danger m-1"
                                                    onclick="return confirm('Confirm delete user?')"
                                                    href="/deleteUser/{{ $user['id'] }}"><i
                                                        class="fa-solid fa-trash"></i></a>
                                                <a class="btn btn-outline-primary m-1"
                                                    href="/xyz-1/editUser/{{ $user['id'] }}"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a class="btn btn-outline-success m-1"
                                                    href="/xyz-1/changePassword/{{ $user['id'] }}"><i
                                                        class="fa-solid fa-lock"></i></a>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
