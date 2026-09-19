<?php 
session_start();
include 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Menu - Pandega Coffee</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
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
            background: rgba(217, 139, 57, 0.2); 
            color: #d98b39;
        }
        .management-table tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }
        .img-thumbnail {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .badge-danger {
            background: #ff4d4d;
            color: white;
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
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
    <div class="profile-container" style="padding: 40px 20px;">
        <div class="profile-card" style="width: 90%; max-width: 900px; min-height: auto;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h1 style="margin: 0; text-align: left;">Kelola Menu Kopi</h1>
                <a href="tambah-menu.php" style="text-decoration: none;">
                    <button style="padding: 10px 20px;">➕ Tambah Menu Baru</button>
                </a>
            </div>

            <table class="management-table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th style="text-align: center;">Aksis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($konek, "SELECT * FROM menu ORDER BY id DESC");
                    
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            $id_menu = $row['id'];
                            $nama    = htmlspecialchars($row['nama_menu']);
                            $harga   = $row['harga'];
                            $stok    = $row['stok'];
                            $foto    = $row['foto'];
                            ?>
                            <tr>
                                <td>
                                    <img src="assets/image/<?= $foto; ?>" class="img-thumbnail" alt="<?= $nama; ?>">
                                </td>
                                <td style="font-weight: bold;"><?= $nama; ?></td>
                                <td>Rp <?= number_format($harga, 0, ',', '.'); ?></td>
                                <td>
                                    <?= $stok; ?> Porsi
                                    <?php if ($stok <= 5): ?>
                                        <span class="badge-danger">⚠️ Menipis</span>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="process/hapus-menu-proses.php?id=<?= $id_menu; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus menu <?= $nama; ?>?');">
                                        🗑️ Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='5' style='text-align: center; color: #ccc; padding: 30px;'>Belum ada data menu kopi di database.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            
            <p style="margin-top: 30px;"><a href="dashboard.php" style="color: #d98b39; text-decoration: none; font-weight: bold;">⬅️ Kembali ke Dashboard Utama</a></p>
        </div>
    </div>
</body>
</html>
