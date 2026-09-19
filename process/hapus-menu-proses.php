<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include '../config/database.php';

// Memastikan ada ID menu yang dikirimkan lewat URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // 1. Ambil nama menu terlebih dahulu untuk keperluan pencatatan aktivitas aktivitas terbaru
    $cari_menu = mysqli_query($konek, "SELECT nama_menu FROM menu WHERE id = $id");
    if (mysqli_num_rows($cari_menu) > 0) {
        $data_menu = mysqli_fetch_assoc($cari_menu);
        $nama_menu = $data_menu['nama_menu'];

        // 2. Jalankan perintah hapus data menu dari database
        $hapus = mysqli_query($konek, "DELETE FROM menu WHERE id = $id");

        if ($hapus) {
            // 3. Catat aktivitas penghapusan ini ke tabel aktivitas atas nama Leon
            $nama_user = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'users';
            $deskripsi = "menghapus menu kopi: " . $nama_menu;
            
            $query_log = "INSERT INTO aktivitas (nama_user, deskripsi_aktivitas) VALUES ('$nama_user', '$deskripsi')";
            mysqli_query($konek, $query_log);

            echo "<script>
                    alert('Menu " . $nama_menu . " berhasil dihapus!');
                    window.location.href = '../kelola-menu.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Gagal menghapus menu dari database.');
                    window.location.href = '../kelola-menu.php';
                  </script>";
            exit();
        }
    }
} else {
    header("Location: ../kelola-menu.php");
    exit();
}
?>
