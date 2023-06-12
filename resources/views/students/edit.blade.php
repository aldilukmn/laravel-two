@extends('layouts.app')

@section('content')
    <div class="card mb-5">
        <div class="card-header">
            <h4>Edit a data student</h4>
        </div>
        <div class="card-body mx-3">
            <form action="{{ url('students/' . $id_student) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="id_student" class="col-sm-2 col-form-label fw-semibold">Student Id</label>
                    <div class="col-sm-10">
                        <input type="number"
                            class="form-control @error('id_student') is-invalid @enderror @if (!empty(old('id_student'))) is-valid @endif"
                            id="id_student" placeholder="Enter your full student id ..." name="id_student"
                            value="{{ $id_student }}" readonly>
                        @error('id_student')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fullName" class="col-sm-2 col-form-label fw-semibold">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control @error('fullName') is-invalid @enderror @if (!empty(old('fullName'))) is-valid @endif"
                            id="fullName" placeholder="Enter your full name ..." name="fullName"
                            value="{{ $fullName }}">
                        @error('fullName')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gender" class="col-sm-2 form-label fw-semibold">Gender</label>
                    <div class="col-sm-10">
                        <select id="gender"
                            class="form-select @error('gender') is-invalid @enderror @if (!empty(old('gender'))) is-valid @endif"
                            name="gender">
                            <option selected disabled>Choose your gender</option>
                            <option value="M" {{ $gender == 'M' ? 'selected' : '' }}>Male</option>
                            <option value="F" {{ $gender == 'F' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 col-form-label fw-semibold">Address</label>
                    <div class="col-sm-10">
                        <textarea type="text"
                            class="form-control @error('address') is-invalid @enderror @if (!empty(old('address'))) is-valid @endif"
                            id="address" placeholder="Enter your address ..." name="address" cols="10" rows="5"
                            >{{ $address }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label fw-semibold">Email</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control @error('email') is-invalid @enderror @if (!empty(old('email'))) is-valid @endif"
                            id="email" placeholder="Enter your email ..." name="email" value="{{ $email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label fw-semibold">Phone</label>
                    <div class="col-sm-10">
                        <input type="number"
                            class="form-control @error('phone') is-invalid @enderror @if (!empty(old('phone'))) is-valid @endif"
                            id="phone" placeholder="Enter your phone ..." name="phone" value="{{ $phone }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-between mt-5">
                    <button type="submit" class="btn btn-sm btn-primary mb-3 w-100">
                        Update
                    </button>
                    <button onclick="window.location = '{{ url('students') }}'" type="button"
                        class="btn btn-sm btn-secondary mb-3 w-100">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
