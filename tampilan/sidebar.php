
<?php 
session_start();

// Cek apakah pengguna sudah login
if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=belummasuk");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="assets/fontawesome-free/js/all.js">
    
    <style>
        /* Tambahkan gaya CSS untuk sidebar */
        .main-sidebar {
            width: 250px;
            transition: width 0.3s;
            
        }
        .main-sidebar.closed {
            width: 0;
            overflow: hidden;
        }
        .sidebar-wrapper {
            overflow: hidden;
            width: 100%;
        }
    </style>

</head>
<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto"></form>
                <ul class="navbar-nav navbar-right">
                <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" id="toggleSidebar" class="nav-link nav-link-lg">
                                <i class="fas fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                    
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="img/dosq15.jpg" class="rounded-circle mr-1">
                            Halo <b><?php echo $_SESSION['username']; ?></b>, Anda adalah <b><?php echo $_SESSION['level']; ?></b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="index.php" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="main-sidebar shadow">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a>Aplikasi Pembayaran SPP</a>
                  
                    </div>
                    <ul class="sidebar-menu">
                        <?php if ($_SESSION['level'] == "petugas") { ?>
                            <li class="menu-header">Dashboard</li>
                            <li><a href="dashboard.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
                            <li class="menu-header">Data</li>
                            <li><a class="nav-link" href="spp.php"><i class="fas fa-database"></i> <span>DATA SPP</span></a></li>
                            <li><a class="nav-link" href="kelas.php"><i class="fas fa-database"></i> <span>DATA KELAS</span></a></li>
                            <li class="menu-header">Personal</li>
                            <li><a class="nav-link" href="petugas.php"><i class="fas fa-user-edit"></i> <span>PETUGAS</span></a></li>
                            <li><a class="nav-link" href="siswa.php"><i class="fas fa-user-graduate"></i> <span>SISWA</span></a></li>
                            <li class="menu-header">Fitur</li>
                            <li><a class="nav-link" href="transaksi.php"><i class="fas fa-money-check-alt"></i> <span>TRANSAKSI PEMBAYARAN</span></a></li>
                            <li><a class="nav-link" href="laporan.php"><i class="fas fa-book"></i> <span>LAPORAN</span></a></li>

                        <?php } else if ($_SESSION['level'] == "siswa") { ?>
                            <li class="menu-header">Dashboard</li>
                            <li><a class="nav-link" href="dashboard.php"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
                            <li class="menu-header">Fitur</li>
                            <li><a class="nav-link" href="spp.php"><i class="fas fa-database"></i> <span>DATA SPP</span></a></li>
                            <li><a class="nav-link" href="history.php"><i class="fas fa-book"></i> <span>HISTORY PEMBAYARAN</span></a></li>
                        <?php } else {
                            header("location:index.php?pesan=gagal");
                            exit;
                        } ?>
                    </ul>
                </aside>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.main-sidebar').classList.toggle('closed');
        });
    </script>
</body>
</html>