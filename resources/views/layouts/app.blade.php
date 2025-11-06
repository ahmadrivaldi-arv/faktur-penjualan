<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/js/app.js'])
    <style>
        .sidebar-nav .list-group-item {
            border: none;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .sidebar-nav .list-group-item .text-label {
            flex: 1;
        }

        .sidebar-nav .list-group-item-action:hover {
            background-color: rgba(13, 110, 253, 0.12);
        }

        .sidebar-nav .list-group-item.active {
            background-color: rgba(13, 110, 253, 0.2);
            color: #0d6efd;
            font-weight: 600;
        }

        .sidebar-nav .toggle .chevron {
            transition: transform 0.2s ease;
        }

        .sidebar-nav .toggle[aria-expanded="true"] .chevron {
            transform: rotate(180deg);
        }

        .sidebar-nav .submenu .list-group-item {
            padding-left: 2.5rem;
            position: relative;
        }

        .sidebar-nav .submenu .list-group-item::before {
            content: "";
            position: absolute;
            left: 1.5rem;
            top: 8px;
            bottom: 8px;
            width: 1px;
            background: rgba(13, 110, 253, 0.2);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

<header class="bg-dark text-white py-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">{{ config('app.name') }}</h1>
        @auth
            <div class="d-flex align-items-center gap-3">
                <div class="text-end">
                    <div class="fw-semibold">{{ auth()->user()->name }}</div>
                    <div class="small text-white-50">{{ auth()->user()->email }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Keluar</button>
                </form>
            </div>
        @endauth
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Menu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('dashboard') }}">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Kelola Data Perusahaan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('perusahaan.index') }}">List Perusahaan</a></li>
                        <li><a class="dropdown-item" href="{{ route('perusahaan.create') }}">Tambah Perusahaan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Kelola Data Customer
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('customer.index') }}">List Customer</a></li>
                        <li><a class="dropdown-item" href="{{ route('customer.create') }}">Tambah Customer</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Kelola Data Penjualan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('penjualan.index') }}">List Penjualan</a></li>
                        <li><a class="dropdown-item" href="{{ route('penjualan.create') }}">Tambah Penjualan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Kelola Data Produk
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('produk.index') }}">List Produk</a></li>
                        <li><a class="dropdown-item" href="{{ route('produk.create') }}">Tambah Produk</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid flex-grow-1">
    <div class="row flex-nowrap">
        <aside class="col-md-3 bg-light p-3 min-vh-100 d-none d-md-block">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-semibold">Navigasi</div>
                <div class="list-group list-group-flush sidebar-nav">
                    <a href="{{ route('dashboard') }}"
                       class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house-door"></i>
                        <span class="text-label">Beranda</span>
                    </a>
                    <button
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between gap-2 toggle {{ request()->routeIs('perusahaan.*') ? 'active' : '' }}"
                        type="button" data-bs-toggle="collapse" data-bs-target="#sidebarPerusahaanMenu"
                        aria-expanded="{{ request()->routeIs('perusahaan.*') ? 'true' : 'false' }}"
                        aria-controls="sidebarPerusahaanMenu">
                        <span class="d-flex align-items-center gap-2">
                            <i class="bi bi-building"></i>
                            <span class="text-label">Kelola Data Perusahaan</span>
                        </span>
                        <i class="bi bi-chevron-down chevron"></i>
                    </button>
                    <div class="collapse {{ request()->routeIs('perusahaan.*') ? 'show' : '' }}"
                         id="sidebarPerusahaanMenu">
                        <div class="list-group list-group-flush submenu">
                            <a href="{{ route('perusahaan.index') }}"
                               class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->routeIs('perusahaan.index') ? 'active' : '' }}">
                                <i class="bi bi-card-list"></i>
                                <span class="text-label">List Perusahaan</span>
                            </a>
                            <a href="{{ route('perusahaan.create') }}"
                               class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->routeIs('perusahaan.create') ? 'active' : '' }}">
                                <i class="bi bi-plus-circle"></i>
                                <span class="text-label">Tambah Perusahaan</span>
                            </a>
                        </div>
                    </div>
                    <button
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between gap-2 toggle {{ request()->routeIs('customer.*') ? 'active' : '' }}"
                        type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCustomerMenu"
                        aria-expanded="{{ request()->routeIs('customer.*') ? 'true' : 'false' }}"
                        aria-controls="sidebarCustomerMenu">
                        <span class="d-flex align-items-center gap-2">
                            <i class="bi bi-people"></i>
                            <span class="text-label">Kelola Data Customer</span>
                        </span>
                        <i class="bi bi-chevron-down chevron"></i>
                    </button>
                    <div class="collapse {{ request()->routeIs('customer.*') ? 'show' : '' }}"
                         id="sidebarCustomerMenu">
                        <div class="list-group list-group-flush submenu">
                            <a href="{{ route('customer.index') }}"
                               class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->routeIs('customer.index') ? 'active' : '' }}">
                                <i class="bi bi-card-list"></i>
                                <span class="text-label">List Customer</span>
                            </a>
                            <a href="{{ route('customer.create') }}"
                               class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->routeIs('customer.create') ? 'active' : '' }}">
                                <i class="bi bi-plus-circle"></i>
                                <span class="text-label">Tambah Customer</span>
                            </a>
                        </div>
                    </div>
                    <button
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between gap-2 toggle {{ request()->routeIs('penjualan.*') ? 'active' : '' }}"
                        type="button" data-bs-toggle="collapse" data-bs-target="#sidebarPenjualanMenu"
                        aria-expanded="{{ request()->routeIs('penjualan.*') ? 'true' : 'false' }}"
                        aria-controls="sidebarPenjualanMenu">
                        <span class="d-flex align-items-center gap-2">
                            <i class="bi bi-bag-check"></i>
                            <span class="text-label">Kelola Data Penjualan</span>
                        </span>
                        <i class="bi bi-chevron-down chevron"></i>
                    </button>
                    <div class="collapse {{ request()->routeIs('penjualan.*') ? 'show' : '' }}"
                         id="sidebarPenjualanMenu">
                        <div class="list-group list-group-flush submenu">
                            <a href="{{ route('penjualan.index') }}"
                               class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->routeIs('penjualan.index') ? 'active' : '' }}">
                                <i class="bi bi-card-list"></i>
                                <span class="text-label">List Penjualan</span>
                            </a>
                            <a href="{{ route('penjualan.create') }}"
                               class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->routeIs('penjualan.create') ? 'active' : '' }}">
                                <i class="bi bi-plus-circle"></i>
                                <span class="text-label">Tambah Penjualan</span>
                            </a>
                        </div>
                    </div>
                    <button
                        class="list-group-item list-group-item-action d-flex align-items-center justify-content-between gap-2 toggle {{ request()->routeIs('produk.*') ? 'active' : '' }}"
                        type="button" data-bs-toggle="collapse" data-bs-target="#sidebarProdukMenu"
                        aria-expanded="{{ request()->routeIs('produk.*') ? 'true' : 'false' }}"
                        aria-controls="sidebarProdukMenu">
                        <span class="d-flex align-items-center gap-2">
                            <i class="bi bi-box-seam"></i>
                            <span class="text-label">Kelola Data Produk</span>
                        </span>
                        <i class="bi bi-chevron-down chevron"></i>
                    </button>
                    <div class="collapse {{ request()->routeIs('produk.*') ? 'show' : '' }}"
                         id="sidebarProdukMenu">
                        <div class="list-group list-group-flush submenu">
                            <a href="{{ route('produk.index') }}"
                               class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->routeIs('produk.index') ? 'active' : '' }}">
                                <i class="bi bi-card-list"></i>
                                <span class="text-label">List Produk</span>
                            </a>
                            <a href="{{ route('produk.create') }}"
                               class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->routeIs('produk.create') ? 'active' : '' }}">
                                <i class="bi bi-plus-circle"></i>
                                <span class="text-label">Tambah Produk</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="col-md-9 bg-white p-4">
            @yield('content', $slot ?? '')
        </main>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-auto">
    © {{ now()->year }} {{ config('app.name') }}
</footer>

</body>
</html>
