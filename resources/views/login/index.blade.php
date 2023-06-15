@extends('layouts.container')

@section('container')
    <div class="card col-xl-3 col-lg-5 col-md-8 col-sm-10 mx-auto p-3 mt-5 shadow-sm">
        <h2 class="text-center">Login</h2>
        <hr>
        <form action="{{ url('login/process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label fw-bold">Username</label>
                <input type="text"
                    class="form-control @error('username') is-invalid @enderror @if (!empty(old('username'))) is-valid @endif"
                    id="formGroupExampleInput" placeholder="Enter your username" name="username" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label fw-bold">Password</label>
                <input type="password"
                    class="form-control @error('password') is-invalid @enderror @if (!empty(old('password'))) is-valid @endif"
                    id="formGroupExampleInput2" placeholder="Enter your password" name="password" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 mb-3">
                <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>
        </form>
    </div>
@endsection
