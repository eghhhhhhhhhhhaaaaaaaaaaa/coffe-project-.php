<?php
// 1. Panggil koneksi database
include '../config/database.php';

if (isset($_POST['submit'])) {
    // 2. Ambil data dari form dan amankan dari input berbahaya
    $nama_menu = mysqli_real_escape_string($konek, $_POST['nama_menu']);
    $harga     = intval($_POST['harga']);
    $stok      = intval($_POST['stok']);

    // 3. Ambil data informasi file foto
    $nama_file = $_FILES['foto']['name'];
    $tmp_file  = $_FILES['foto']['tmp_name'];
    $error_file= $_FILES['foto']['error'];

    // Acak nama file agar unik tidak bentrok di server
    $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
    $nama_file_baru = uniqid() . "." . $ekstensi_file;

    // Tentukan folder tujuan penyimpanan gambar (assets/image/)
    $folder_tujuan = "../assets/image/" . $nama_file_baru;

    // Cek apakah tidak ada error pada file gambar
    if ($error_file === 0) {
        // Pindahkan file dari memori sementara ke folder aset Anda
        if (move_uploaded_file($tmp_file, $folder_tujuan)) {
            
            // 4. Masukkan data ke dalam tabel 'menu'
            $query = "INSERT INTO menu (nama_menu, harga, stok, foto) VALUES ('$nama_menu', '$harga', '$stok', '$nama_file_baru')";
            $simpan = mysqli_query($konek, $query);

            // 5. JIKA BERHASIL SIMPAN MENU, LANJUT CATAT AKTIVITAS
            if ($simpan) {
                // Mulai session untuk membaca siapa yang login
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                
                // Jika session nama ada, pakai nama itu. Jika kosong, default otomatis 'Leon'
                $nama_user = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'users'; 
                
                // Buat teks deskripsi log aktivitas terbaru Anda
                $deskripsi = "menambahkan menu baru: " . $nama_menu;

                // Masukkan riwayat aktivitas ke tabel database
                $query_log = "INSERT INTO aktivitas (nama_user, deskripsi_aktivitas) VALUES ('$nama_user', '$deskripsi')";
                mysqli_query($konek, $query_log);

                // Notifikasi sukses dan kembali ke dashboard
                echo "<script>
                        alert('Menu baru berhasil ditambahkan!');
                        window.location.href = '../dashboard.php';
                      </script>";
                exit();
            } else {
                echo "<script>
                        alert('Gagal menyimpan data ke database: " . mysqli_error($konek) . "');
                        window.location.href = '../tambah-menu.php';
                      </script>";
                exit();
            }
        } else {
            echo "<script>
                    alert('Gagal mengunggah file gambar ke folder aset.');
                    window.location.href = '../tambah-menu.php';
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('Terjadi kesalahan pada file gambar.');
                window.location.href = '../tambah-menu.php';
              </script>";
        exit();
    }
} else {
    // Jika coba diakses langsung tanpa submit form, tendang ke dashboard
    header("Location: ../dashboard.php");
    exit();
}
?>
