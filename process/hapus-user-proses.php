<?php
// Paksa PHP buat nongolin error kalau ada yang aspal kodenya
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include '../config/database.php';

// Cek dulu ada ID user yang dikirim kagak lewat URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

        // 1. Intip dulu username-nya di database sebelum di-kick (ubah dari nama_user jadi username)
    $cari_user = mysqli_query($konek, "SELECT username FROM users WHERE id = $id");
    
    if (mysqli_num_rows($cari_user) > 0) {
        $data_user = mysqli_fetch_assoc($cari_user);
        $target_user = $data_user['username']; // Ubah ini juga

        // 2. Eksekusi hapus
        $hapus = mysqli_query($konek, "DELETE FROM users WHERE id = $id");
        
        // ... (sisa kode log aktivitas di bawahnya tetep sama) ...

        if ($hapus) {
            // 3. Catat kelakuan si Leon di tabel aktivitas biar ketahuan siapa yang hapus
            $nama_admin = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'users';
            $deskripsi = "menghapus pengguna sistem: " . $target_user;
            
            $query_log = "INSERT INTO aktivitas (nama_user, deskripsi_aktivitas) VALUES ('$nama_admin', '$deskripsi')";
            mysqli_query($konek, $query_log);

            // Pop-up sukses terus balikin ke halaman kelola user
            echo "<script>
                    alert('User " . $target_user . " sukses didepak dari web! 🔥');
                    window.location.href = '../kelola-user.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Waduh gagal hapus user bro, ada yang salah ama SQL-nya.');
                    window.location.href = '../kelola-user.php';
                  </script>";
            exit();
        }
    } else {
        header("Location: ../kelola-user.php");
        exit();
    }
} else {
    header("Location: ../kelola-user.php");
    exit();
}
?>
