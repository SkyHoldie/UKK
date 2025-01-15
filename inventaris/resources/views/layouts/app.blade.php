<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- CoreUI CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.0/dist/css/coreui.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
        }

        .wrapper {
            display: flex;
            height: 100vh;
        }

        .c-sidebar {
            width: 250px;
            background-color: #343a40;
            color: #ffffff;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: 1020;
            transition: left 0.3s ease;
        }

        .c-sidebar .c-sidebar-brand {
            padding: 1rem;
            text-align: center;
            font-size: 1.25rem;
            font-weight: bold;
            color: #ffffff;
            background-color: #007bff;
        }

        .c-sidebar .c-sidebar-nav-item a {
            color: #ffffff;
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            text-decoration: none;
        }

        .c-sidebar .c-sidebar-nav-item a:hover,
        .c-sidebar .c-sidebar-nav-link.active {
            background-color: #007bff;
            color: #ffffff;
        }

        .c-sidebar .c-sidebar-nav-item a i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .c-header {
            background-color: #007bff; /* Mengubah warna header menjadi biru */
            color: white;
            padding: 1rem;
            z-index: 1030;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding-left: 250px; /* Menambahkan ruang untuk sidebar */
        }

        .c-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .c-header .c-header-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .c-content {
            margin-left: 250px;
            padding: 2rem;
            width: 100%;
        }

        .dashboard-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 80px; /* Menyesuaikan dengan sidebar */
        }

        .dashboard-header .user-info {
            font-size: 1rem;
        }

        .dashboard-header .user-info span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="c-sidebar" id="sidebar">
            <div class="c-sidebar-brand">
                Inventaris Management Barang
            </div>
            <ul class="c-sidebar-nav-items list-unstyled">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.kategori_asset.index') }}">
                        <i class="bi bi-box"></i> Kategori Asset
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.sub_kategori_asset.index') }}">
                        <i class="bi bi-boxes"></i> Sub Kategori Asset
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.distributor.index') }}">
                        <i class="bi bi-truck"></i> Distributor
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.merk.index') }}">
                        <i class="bi bi-tags"></i> Merk
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.satuan.index') }}">
                        <i class="bi bi-rulers"></i> Satuan
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.master_barang.index') }}">
                        <i class="bi bi-box-seam"></i> Master Barang
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.depresiasi.index') }}">
                        <i class="bi bi-piggy-bank"></i> Depresiasi
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.pengadaan.index') }}">
                        <i class="bi bi-cart"></i> Pengadaan
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.lokasi.index') }}">
                        <i class="bi bi-geo-alt"></i> Lokasi
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.mutasi_lokasi.index') }}">
                        <i class="bi bi-arrows-move"></i> Mutasi Lokasi
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.opname.index') }}">
                        <i class="bi bi-journal"></i> Opname
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('admin.hitung_depresiasi.index') }}">
                        <i class="bi bi-calculator"></i> Hitung Depresiasi
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button class="btn btn-danger w-100">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="c-content" id="content">
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <div class="container">
                    <h1 class="c-header-title">Dashboard</h1>
                    <div class="user-info d-flex align-items-center">
                        <span class="bi bi-person-circle me-2"></span>
                        <span>Hi, Admin</span> <!-- Sapaan "Hi, Admin" -->
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="p-3">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- CoreUI dan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.0/dist/js/coreui.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
