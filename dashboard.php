<?php 
    session_start();

    include 'config/database.php';

    if(!isset($_SESSION["username"])) {
        header("Location: process/login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Egha Coffee</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="dashboard">

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="logo">
            ☕ <span>Egha Coffee</span>
        </div>

        <ul class="menu">
            
            <li class="active">
                <a href="#">🏠 Dashboard</a>
            </li>

            <li>
                <a href="kelola-menu.php" style="text-decoration: none; color: inherit;">☕ Kelola Menu</a>
            </li>

            <li>
                <a href="#">📦 Kelola Pesanan</a>
            </li>

            <li>
                <a href="kelola-user.php" style="text-decoration: none; color: inherit;">👥 Kelola User</a>
            </li>

            <li>
                <a href="#">📊 Laporan</a>
            </li>

            <li>
                <a href="#">⚙ Pengaturan</a>
            </li>

            <li>
                <a href="coffe.php">Halaman Coffe</a>
            </li>

        </ul>

        <a href="process/log-out.php" class="logout">
            🚪 Logout
        </a>

    </aside>

    <!-- Content -->
    <div class="content">

        <!-- Topbar -->
        <header class="topbar">

            <div>
                <h1>Dashboard Admin</h1>
                <p>Selamat Datang Kembali 👋</p>
            </div>

            <div class="profile">

                <div class="avatar">
                    👤
                </div>

                <div>

                    <strong>
                        <?php echo $_SESSION["username"]; ?>
                    </strong>

                    <br>

                    <small>
                        <?php echo ucfirst($_SESSION["role"]); ?>
                    </small>

                </div>

            </div>

        </header>

        <!-- Statistik -->
        <section class="cards">

            <div class="card">
                <h3>👥 User</h3>
                <h2>25</h2>
                <p>Total Pengguna</p>
            </div>

            <div class="card">
                <h3>☕ Menu</h3>
                <h2>15</h2>
                <p>Produk Coffee</p>
            </div>

            <div class="card">
                <h3>📦 Order</h3>
                <h2>42</h2>
                <p>Pesanan Hari Ini</p>
            </div>

            <div class="card">
                <h3>💰 Pendapatan</h3>
                <h2>Rp 520K</h2>
                <p>Hari Ini</p>
            </div>

        </section>

        <!-- Menu Cepat -->
        <section class="quick-action">

            <h2>Quick Action</h2>

            <div class="action-grid">

                <a href="tambah-menu.php">
                    ➕ Tambah Menu
                </a>

                <a href="#">
                    👥 Kelola User
                </a>

                <a href="#">
                    📦 Kelola Pesanan
                </a>

                <a href="#">
                    📊 Lihat Laporan
                </a>

            </div>

        </section>

        <!-- Aktivitas -->
        <section class="activity">

    <h2>Aktivitas Terbaru</h2>

    <table>
        <tr>
            <th>Waktu</th>
            <th>Aktivitas</th>
        </tr>

        <?php
        // 1. Panggil koneksi database jika belum dipanggil di bagian paling atas file dashboard.php
        // include 'config/database.php';

        // 2. Ambil 5 data aktivitas terbaru diurutkan dari yang paling baru (DESC)
        $ambil_aktivitas = mysqli_query($konek, "SELECT * FROM aktivitas ORDER BY waktu DESC LIMIT 5");

        // 3. Cek apakah ada data aktivitas di database
        if (mysqli_num_rows($ambil_aktivitas) > 0) {
            while ($row = mysqli_fetch_assoc($ambil_aktivitas)) {
                // Mengubah format timestamp menjadi format jam saja (contoh: 10:30) sesuai tabel asli Anda
                $waktu = date('H:i', strtotime($row['waktu']));
                ?>
                <tr>
                    <!-- Menampilkan jam aktivitas -->
                    <td><?= $waktu; ?></td>
                    <!-- Menampilkan gabungan Nama User dan deskripsi aktivitasnya -->
                    <td>
                        <strong style="color: #d98b39;"><?= htmlspecialchars($row['nama_user']); ?></strong> 
                        <?= htmlspecialchars($row['deskripsi_aktivitas']); ?>
                    </td>
                </tr>
                <?php
            }
        } else {
            // Tampilan jika tabel aktivitas di database masih kosong
            ?>
            <tr>
                <td colspan="2" style="text-align: center; color: #ccc;">Belum ada aktivitas terbaru hari ini.</td>
            </tr>
            <?php
        }
        ?>

    </table>

    </section>

    </div>

</div>

</body>
</html>