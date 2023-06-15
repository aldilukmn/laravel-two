@extends('layouts.container')

@section('content')
    @if ($message = Session::get('success'))
        <script type="text/javascript" src="{{ asset('assets/js/sweetAlert.js') }}"></script>
        <script>
            const message = "{{ $message }}";
            showToast('success', message);
        </script>
    @endif
    <div class="card mb-5">
        <div class="card-header d-flex">
            <h4>List Student</h4>
            <button type="button" class="btn btn-primary btn-sm ms-auto"
                onclick="window.location = '{{ 'students/create' }}'">
                <i class="fas fa-plus-circle"></i> Add Student
            </button>
        </div>
        <div class="card-body">
            <form method="GET">
                <div class="row my-3">
                    <div class="col-sm-10 mb-3">
                        <input type="text" class="form-control form-control-sm" id="search"
                            placeholder="Please search student ..." name="search" value="{{ request('search') }}">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-sm btn-primary w-100">Search</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Student Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1 + ($students->currentPage() - 1) * $students->perPage();
                        @endphp
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $student->id_student }}</td>
                                <td>{{ $student->fullName }}</td>
                                <td>{{ $student->gender === 'M' ? 'Male' : 'Female' }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button onclick="window.location = '{{ url('students/' . $student->id_student) }}'"
                                            type="button" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                                        <form action="{{ url('students/' . $student->id_student) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="deleteConfirm(event)" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $students->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>
@endsection
