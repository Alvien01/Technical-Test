<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Technical Test')</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background: #343a40;
            padding-top: 60px;
            transition: left 0.3s ease;
            z-index: 1000;
        }
        .sidebar.active {
            left: 0;
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }
        .content.shift {
            margin-left: 250px;
        }
        .hamburger {
            font-size: 24px;
            cursor: pointer;
            color: #fff;
            margin-right: 15px;
        }
        .navbar {
            z-index: 1100;
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-3">
        <span class="hamburger" id="hamburger">&#9776;</span>
        <a class="navbar-brand" href="#">Technical Test</a>
    </nav>
    <div class="sidebar" id="sidebar">
        <h5 class="text-white px-3">Menu</h5>
        <hr class="bg-secondary">
        @if(auth()->check())
            {{-- Admin Menu --}}
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                <a href="{{ route('tukang.index') }}">Kelola Tukang</a>
                <a href="{{ route('order.index') }}">Kelola Order</a>
                <hr class="bg-secondary">
                <a href="{{ route('tukang.dashboard') }}">Dashboard Tukang</a>
                <a href="{{ route('dashboard') }}">Dashboard User</a>
                <a href="{{ route('order.index') }}">Pesanan Saya</a>
            @elseif(auth()->user()->role === 'tukang')
                <a href="{{ route('tukang.dashboard') }}">Dashboard Tukang</a>
            @elseif(auth()->user()->role === 'user')
                <a href="{{ route('dashboard') }}">Dashboard User</a>
                <a href="{{ route('order.index') }}">Pesanan Saya</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
                @csrf
                <button class="btn btn-danger w-100">Logout</button>
            </form>
        @endif
    </div>
    <div class="content" id="content">
        <main class="container mt-4">
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        document.getElementById("hamburger").addEventListener("click", function () {
            document.getElementById("sidebar").classList.toggle("active");
            document.getElementById("content").classList.toggle("shift");
        });
    </script>
    @stack('scripts')
</body>
</html>
