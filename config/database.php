<?php 
    $hostDB = "localhost";
    $userDB = "root";
    $passwordDB = "";
    $namedatabaseDB = "leondatabasephp";

    $konek = mysqli_connect($hostDB, $userDB, $passwordDB, $namedatabaseDB);

    if(!$konek) {
        die("koneksi gagal" . mysqli_connect_error());
    } else{
        //echo "koneksi berhasil";
    }
?>