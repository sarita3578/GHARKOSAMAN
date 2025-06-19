<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GharKoSaman | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body { font-family: 'Segoe UI', sans-serif; }
        .hero-banner { background-color: #f5f5f5; padding: 40px 20px; display: flex; justify-content: space-between; align-items: center; }
        .category-icon, .info-icon { font-size: 2rem; color: #2e8b57; }
        .product-card { border: 1px solid #eee; border-radius: 10px; padding: 10px; text-align: center; }
        .banner, .footer { background-color: #fffaf0; padding: 30px 0; }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="d-flex justify-content-between px-4 py-2 bg-light">
        <div>Delivery to 📍 4100 Bisset Street, Pokhara</div>
        <div>
            <a href="tel:+9779800000000">📞 +977 9800000000</a> | 
            @guest <a href="{{ route('login') }}">Login</a> @endguest
            @auth <a href="{{ route('dashboard') }}">Dashboard</a> @endauth
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
        <a class="navbar-brand" href="{{ url('/') }}">GharKoSaman</a>
        <form class="d-flex w-50">
            <input class="form-control me-2" type="search" placeholder="Search for product..." />
        </form>
        <div><a href="{{ url('/cart') }}">🛒 Cart</a></div>
    </nav>

    <!-- Page Content -->
    <main class="container my-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p>&copy; 2025 GharKoSaman | Built with Laravel</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

