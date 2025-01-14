<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- CoreUI CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.0/dist/css/coreui.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Optional Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        /* Custom styles for sidebar and content */
        .c-sidebar {
            width: 250px;
        }

        .c-content {
            transition: margin-left 0.3s ease;
        }

        .c-sidebar-hidden {
            margin-left: -250px;
        }

        .c-sidebar-nav-item {
            font-size: 1rem;
        }

        .c-sidebar-nav-link.active {
            background-color: #007bff;
        }
    </style>
</head>
<body>

    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <div class="c-sidebar c-sidebar-light c-sidebar-fixed" id="sidebar">
            <div class="c-sidebar-brand">
                <h3 class="text-center text-light">Admin Dashboard</h3>
            </div>
            <div class="c-sidebar-nav">
                <ul class="c-sidebar-nav-items">
                    <!-- Kategori Asset -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.kategori_asset.index') }}">
                            Kategori Asset
                        </a>
                    </li>
                    <!-- Sub Kategori Asset -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.sub_kategori_asset.index') }}">
                            Sub Kategori Asset
                        </a>
                    </li>
                    <!-- Distributor -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.distributor.index') }}">
                            Distributor
                        </a>
                    </li>
                    <!-- Merk -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.merk.index') }}">
                            Merk
                        </a>
                    </li>
                    <!-- Satuan -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.satuan.index') }}">
                            Satuan
                        </a>
                    </li>
                    <!-- Master Barang -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.master_barang.index') }}">
                            Master Barang
                        </a>
                    </li>
                    <!-- Depresiasi -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.depresiasi.index') }}">
                            Depresiasi
                        </a>
                    </li>
                    <!-- Pengadaan -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.pengadaan.index') }}">
                            Pengadaan
                        </a>
                    </li>
                    <!-- Lokasi -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.lokasi.index') }}">
                            Lokasi
                        </a>
                    </li>
                    <!-- Mutasi Lokasi -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.mutasi_lokasi.index') }}">
                            Mutasi Lokasi
                        </a>
                    </li>
                    <!-- Opname -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.opname.index') }}">
                            Opname
                        </a>
                    </li>
                    <!-- Hitung Depresiasi -->
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.hitung_depresiasi.index') }}">
                            Hitung Depresiasi
                        </a>
                    </li>
                    <!-- Logout -->
                    <li class="c-sidebar-nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger w-100">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="c-content">
            <!-- Header -->
            <header class="c-header bg-primary text-white p-3">
                <div class="d-flex justify-content-between">
                    <button id="sidebarToggleBtn" class="btn btn-light">
                        <i class="bi bi-list"></i> Menu
                    </button>
                    <h1>Dashboard</h1>
                </div>
            </header>

            <!-- Main content goes here -->
            @yield('content')
        </div>
    </div>

    <!-- CoreUI and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.0/dist/js/coreui.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script untuk Toggle Sidebar -->
    <script>
        document.getElementById('sidebarToggleBtn').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('c-sidebar-hidden');
            document.querySelector('.c-content').classList.toggle('c-sidebar-hidden');
        });
    </script>
</body>
</html>
