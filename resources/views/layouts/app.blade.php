<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>{{ $title }}</title>
</head>

<body>
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
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>

</html>
