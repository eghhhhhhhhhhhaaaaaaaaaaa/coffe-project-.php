<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu Kopi</title>
   
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-card">
            <h1>Tambah Menu Baru</h1>
            
            <!-- Form untuk input data dan upload gambar -->
            <form action="process/tambah-menu-proses.php" method="POST" enctype="multipart/form-data" class="auth-card" style="padding:0; background:none; backdrop-filter:none; width:100%;">
                <input type="text" name="nama_menu" placeholder="Nama Menu Kopi / Makanan" required>
                <input type="number" name="harga" placeholder="Harga (Contoh: 25000)" required>
                <input type="number" name="stok" placeholder="Jumlah Stok Awal" required>
                
                <!-- Label penanda input file -->
                <label style="color:#ccc; display:block; margin: 10px 0 5px 5px; font-size:14px;">Unggah Foto Menu:</label>
                <input type="file" name="foto" accept="image/*" required style="padding:10px;">
                
                <button type="submit" name="submit">Simpan Menu</button>
                <p><a href="dashboard.php">⬅️ Kembali ke Dashboard</a></p>
            </form>
        </div>
    </div>
</body>
</html>
