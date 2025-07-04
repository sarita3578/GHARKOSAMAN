<!-- resources/views/layouts/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">GharKoSaman</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>

                {{-- Example Categories dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item" href="{{ url('/category/beverages') }}">Beverages</a></li>
                        <li><a class="dropdown-item" href="{{ url('/category/snacks') }}">Snacks</a></li>
                        <!-- Add more categories -->
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @guest
                    <!-- Guest Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <!-- Authenticated User -->
                    @php
                        $dashboardRoute = Auth::user()->role === 'admin' ? '/admin/dashboard' :
                                          (Auth::user()->role === 'delivery' ? '/delivery/dashboard' : '/user/dashboard');
                    @endphp

                    <li class="nav-item">
                        <a class="nav-link" href="{{ $dashboardRoute }}">
                            Dashboard ({{ ucfirst(Auth::user()->role) }})
                        </a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="display:inline; padding: 0; border: none;">
                                Logout
                            </button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
