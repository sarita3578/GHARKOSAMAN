<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
    <div>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.orders') }}">Orders</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
      </ul>
    </div>
    <div>
      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
