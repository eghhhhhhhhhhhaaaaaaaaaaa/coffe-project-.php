<?php 
session_start();
// Memanggil koneksi database coffe-egha Anda
include 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User - Pandega Coffee</title>
    <!-- Menggunakan CSS utama Anda -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Gaya tabel transparan tema glassmorphism agar serasi dengan dashboard Anda */
        .management-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: white;
        }
        .management-table th, .management-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .management-table th {
            background: rgba(217, 139, 57, 0.2); /* Warna jingga khas web Anda */
            color: #d98b39;
        }
        .management-table tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }
        .badge-role {
            padding: 5px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
        }
        .btn-delete {
            background: #ff4d4d;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            font-size: 13px;
        }
        .btn-delete:hover {
            background: #cc0000;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <!-- Menggunakan class kontainer bawaan CSS Anda -->
    <div class="profile-container" style="padding: 40px 20px;">
        <div class="profile-card" style="width: 90%; max-width: 800px; min-height: auto;">
            
            <h1 style="margin: 0 0 20px 0; text-align: left;">Kelola Pengguna Web</h1>

            <table class="management-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Nama User</th>
                        <th>Role</th>
                        <th style="text-align: center; width: 120px;">Aksi</th>
                    </tr>
                </thead>
                                <tbody>
                    <?php
                    // PERBAIKAN: Kita tarik kolom username dari database, bukan nama_user lagi
                    $query = mysqli_query($konek, "SELECT id, username, role FROM users ORDER BY id ASC");
                    
                    if ($query && mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            $id_user   = $row['id'];
                            // Ambil data username
                            $username_tampil = htmlspecialchars($row['username']);
                            $role      = $row['role'];
                            ?>
                            <tr>
                                <td>#<?= $id_user; ?></td>
                                <!-- Menampilkan username yang aktif -->
                                <td style="font-weight: bold; color: white;"><?= $username_tampil; ?></td>
                                <td>
                                    <?php if ($role === 'Owner'): ?>
                                        <span class="badge-role" style="background: #d98b39; color: white;">👑 Owner</span>
                                    <?php else: ?>
                                        <span class="badge-role" style="background: rgba(255, 255, 255, 0.15); color: #ccc;">👤 Pelanggan</span>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="process/hapus-user-proses.php?id=<?= $id_user; ?>" class="btn-delete" onclick="return confirm('Hapus pengguna <?= $username_tampil; ?> dari sistem?');">
                                        🗑️ Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='4' style='text-align: center; color: #ccc; padding: 30px;'>Belum ada data pengguna di database.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            
            <p style="margin-top: 30px;"><a href="dashboard.php" style="color: #d98b39; text-decoration: none; font-weight: bold;">⬅️ Kembali ke Dashboard Utama</a></p>
        </div>
    </div>
</body>
</html>
