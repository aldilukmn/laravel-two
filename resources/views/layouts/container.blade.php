@extends('layouts.app')

@section('container')
    <div class="container-fluid m-0 p-0 d-flex flex-column vh-100">
        <header>
            @include('partials.headers.navbar')
        </header>
        <main class="flex-grow-1 mt-5">
            <div class="container">
                @yield('content')
            </div>
        </main>
        <footer class="text-center bg-dark text-white py-3">
            @include('partials.footers.footer')
        </footer>
    </div>
    <script src="{{ asset('assets/js/sweetAlert.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
@endsection
