@extends('auth/layouts/main')

@section('main')
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card bg-primary-subtle" style="width: 35rem;">
            <div class="card-body py-5 px-5">
                @if (session()->has('registerSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('registerSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                @endif
                <div class="text-center">
                    <h2>Register</h2>
                    <hr>
                </div>
                <form action="/register" method="POST">
                    @csrf
                    @error('username')
                        <div class="text-danger text-start" role="alert">
                            <small>*{{ $message }}</small>
                        </div>
                    @enderror
                    @error('name')
                        <div class="text-danger text-start" role="alert">
                            <small>*{{ $message }}</small>
                        </div>
                    @enderror
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
                    <div class="mb-4">
                        <input type="text" class="form-control" name="username" id="username" autocomplete="off"
                            required placeholder="Username">
                    </div>
                    <div class="mb-4">
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" required
                            placeholder="Name">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" name="password" id="password" autocomplete="off"
                            required placeholder="Password">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                            autocomplete="off" required placeholder="Confirm Password">
                        <div class="text-end mt-1">
                            <i class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                            <label for="togglePassword" id="toggleLabel" style="cursor: pointer;">Show password</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <select name="role" id="role" class="form-control" required>
                            <option value="0">Select role...</option>
                            <option value="1">Admin PT. XYZ</option>
                            <option value="2">Admin PT. XYZ-1</option>
                            <option value="3">Admin PT. XYZ-2</option>
                            <option value="4">Manager PT. XYZ</option>
                            <option value="5">Supervisor PT. XYZ-1</option>
                            <option value="6">Supervisor PT. XYZ-2</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary mb-3">Register</button>
                        <br>
                        Already have an account? let's <a href="/" class="text-primary">Login!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
