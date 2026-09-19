<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: process/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-card">
            <h1>👤 Profile</h1>
            <p><strong>Username:</strong> <?= $_SESSION["username"]; ?></p>
            <p><strong>Role:</strong> <?= $_SESSION["role"]; ?></p>

            <hr>

            <section id="profile">
                <a href="coffe.php" class="btn-coffe">☕ Masuk Website Coffee</a>
                <br><br>

                <?php if ($_SESSION["role"] == "Owner") : ?>
                    <a href="dashboard.php" class="btn-admin">📊 Dashboard Admin</a>
                    <br><br>
                <?php endif; ?>

                <a href="process/log-out.php" class="btn-logout">🚪 Logout</a>
            </section>
        </div>
    </div>
</body>
</html>