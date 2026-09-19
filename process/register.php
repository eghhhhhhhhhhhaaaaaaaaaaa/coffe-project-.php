<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "../config/database.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cek apakah username sudah digunakan
    $cek = mysqli_query($konek, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($cek) > 0) {

        echo "Username sudah digunakan!";

    } else {

        // Hash password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan ke database
        $query = "INSERT INTO users (username, password)
                  VALUES ('$username', '$password')";

        if (mysqli_query($konek, $query)) {

            header("Location: login.php");
            exit;

        } else {

            echo "Registrasi gagal!";

        }

    }

}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Egha Coffee</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="auth-container">

    <div class="auth-card">

        <h1>Register</h1>

        <form method="POST">

            <input
                type="text"
                name="username"
                placeholder="Username"
                required>

            <input
                type="password"
                name="password"
                placeholder="Password"
                required>

            <button type="submit">
                Register
            </button>

        </form>

        <p>
            Sudah punya akun?
            <a href="login.php">Login</a>
        </p>

    </div>

</div>

</body>
</html>