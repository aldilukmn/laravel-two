@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <script type="text/javascript" src="{{ asset('assets/js/sweetAlert.js') }}"></script>
        <script>
            const message = "{{ $message }}";
            showToast('success', message);
        </script>
    @endif
    <div class="card">
        <div class="card-header d-flex">
            <h4>List Student</h4>
            <button type="button" class="btn btn-primary btn-sm ms-auto"
                onclick="window.location = '{{ 'students/create' }}'">
                <i class="fas fa-plus-circle"></i> Add Student
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->id_student }}</td>
                                <td>{{ $student->fullName }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>
                                    <button onclick="window.location = '{{ url('students/' . $student->id_student) }}'" type="button" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
