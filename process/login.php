<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "../config/database.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($konek, $query);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user["password"])) {

            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];

            header("Location: ../profile.php");
            exit;

        } else {

            $error = "Password salah!";

        }

    } else {

        $error = "Username tidak ditemukan!";

    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Egha Coffee</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <h1>Login</h1>

        <?php
        if (isset($error)) {
            echo "<p style='color:red;text-align:center;'>$error</p>";
        }
        ?>

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
                Login
            </button>

        </form>

        <p>
            Belum punya akun?
            <a href="register.php">Register</a>
        </p>

    </div>

</div>

</body>
</html>