<!DOCTYPE html>
<html>
<head>
    <title>Login - GharKoSaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5 bg-white p-4 shadow rounded">
            <h3 class="text-center mb-4">Login</h3>

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('delivery.login') }}">
                @csrf

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>

                <p class="mt-3 text-center">
                    Don't have an account?
                    <a href="{{ route('delivery.register') }}">Register here</a>
                </p>
            </form>
        </div>
    </div>
</div>

</body>
</html>


