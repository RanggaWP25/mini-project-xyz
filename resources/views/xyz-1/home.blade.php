@extends('xyz-1/layouts/main')

@section('main')
    <div class="conainer mt-5 p-5">
        <div class="card bg-primary-subtle p-5">
            <div class="text-center">
                <h1>Selamat Datang {{ Auth::user()->name }}<br>as<br>{{ Auth::user()->position }}</h1>
                @if (session()->has('userUndifined'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('userUndifined') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                @endif

                <div class="mt-5">
                    <a class="btn btn-outline-primary m-1 fw-bold home-btn" style="width:200px; height:200px;"
                        href="/xyz-1/editUser/{{ Auth::user()->id }}">
                        Edit Profile
                    </a>
                    <a class="btn btn-outline-primary m-1 fw-bold home-btn" style="width:200px; height:200px;"
                        href="/xyz-1/changePassword/{{ Auth::user()->id }}">
                        Change Password
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
