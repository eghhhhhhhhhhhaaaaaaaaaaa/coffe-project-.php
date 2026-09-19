<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<link rel="stylesheet" href="assets/css/style.css">
<head>
    <meta charset="UTF-8">
    <title>Egha Coffee</title>
</head>
<body>

<h1>☕ Egha Coffee</h1>

<p>Selamat datang di website Egha Coffee.</p>

<?php if (isset($_SESSION["username"])) : ?>

    <p>Halo, <strong><?= $_SESSION["username"]; ?></strong></p>

    <a href="profile.php">👤 Profile</a><br><br>

<?php else : ?>

    <a href="process/login.php">🔑 Login</a><br><br>

    <a href="process/register.php">📝 Register</a><br><br>

<?php endif; ?>

<a href="coffe.php">☕ Masuk ke Website Coffee</a>

</body>
</html>