<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <title>Login</title>
</head>

<body>
    <div class="card col-xl-3 col-lg-5 col-md-8 col-sm-10 mx-auto p-3 mt-5 vh-50">
        <h2 class="text-center">Login</h2>
        <hr>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label fw-bold">Username</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your username">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label fw-bold">Password</label>
            <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter your password">
        </div>
        <div class="mt-3 mb-3">
            <button class="btn btn-primary w-100">Login</button>
        </div>
    </div>
</body>

</html>
