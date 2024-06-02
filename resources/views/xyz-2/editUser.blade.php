@extends('xyz-2/layouts/main')

@section('main')
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card bg-primary-subtle" style="width: 35rem;">
            <div class="card-body py-5 px-5">
                @if (session()->has('editSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('editSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                @endif
                <div class="text-center">
                    <h2>Edit User</h2>
                    <hr>
                </div>
                <form action="/edit" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{ $data['user']->id }}">
                    @error('name')
                        <div class="text-danger text-start" role="alert">
                            <small>*{{ $message }}</small>
                        </div>
                    @enderror
                    @error('role')
                        <div class="text-danger text-start" role="alert">
                            <small>*{{ $message }}</small>
                        </div>
                    @enderror
                    <div class="mb-5">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" required
                            placeholder="Name" value="{{ $data['user']->name }}">
                    </div>
                    @if (Auth::user()->role != $data['user']->role)
                        <div class="mb-5">
                            <label for="role">Role</label>
                            <select style="form-control" name="role" id="role" required>
                                <option value="0">Select role...</option>
                                <option @if ($data['user']->role == 1) selected @endif value="1">Admin PT. XYZ
                                </option>
                                <option @if ($data['user']->role == 4) selected @endif value="4">Manager PT. XYZ
                                </option>
                            </select>
                        </div>
                    @else
                        <input type="hidden" name="role" id="role" value="{{ Auth::user()->role }}">
                    @endif
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary mb-3">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
