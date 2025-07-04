<!-- Bootstrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="top-bar bg-primary text-white p-2 d-flex justify-content-end align-items-center">
        <div>
            @guest
                <a href="{{ route('login') }}" class="text-decoration-none me-3 text-white">Login</a>
                <a href="{{ route('register') }}" class="text-decoration-none me-3 text-white">Register</a>
            @endguest

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none me-3 text-white">Admin Dashboard</a>
                @elseif(auth()->user()->role === 'delivery')
                    <a href="{{ route('delivery.dashboard') }}" class="text-decoration-none me-3 text-white">Delivery Dashboard</a>
                @else
                    <a href="{{ route('user.dashboard') }}" class="text-decoration-none me-3 text-white">User Dashboard</a>
                @endif

                <a href="#"
                   class="text-decoration-none text-white"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            @endauth
        </div>
    </div>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
