@extends('xyz/layouts/main')

@section('main')
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card bg-primary-subtle" style="width: 35rem;">
            <div class="card-body py-5 px-5">
                @if (session()->has('changePasswordSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('changePasswordSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                @endif
                <div class="text-center">
                    <h2>Change Password</h2>
                    <hr>
                </div>
                <form action="/changePassword" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{ $data['user']->id }}">
                    @error('password')
                        <div class="text-danger text-start" role="alert">
                            <small>*{{ $message }}</small>
                        </div>
                    @enderror
                    @error('password_confirmation')
                        <div class="text-danger text-start" role="alert">
                            <small>*{{ $message }}</small>
                        </div>
                    @enderror

                    <div class="mb-5">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                            autocomplete="off" required>
                    </div>
                    <div class="mb-5">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                            placeholder="Confirm Password" autocomplete="off" required>
                        <div class="text-end mt-1">
                            <i class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                            <label for="togglePassword" id="toggleLabel" style="cursor: pointer;">Show password</label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary mb-3">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
