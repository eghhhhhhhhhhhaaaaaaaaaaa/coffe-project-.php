<?php 
    session_start();

    include 'config/database.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Project Coffe Theme</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
        <h2 class="logo">Pandega Coffe</h2>

        <div class="nav-links">
            <a href="javascript:void(0)" onclick="pindahKeHome()">Home</a>
            <a href="#about">Tentang</a>
            <a href="#menu">Menu</a>
            <a href="#task">Task</a>
            <a href="#contact">Kontak</a>
            <a href="#inventory">Inventory</a>

            <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === "Owner"): ?>
                <a href="dashboard.php">⚙️ Dashboard</a>
            <?php endif; ?>
        </div>
    </nav>

       <section class="home" class="hero" >

    <div class="hero-text">

        <h3>Nikmati Kopimu</h3>

        <h1>
            Rumah Kopi Terbaik
            <br>
            Dikota Mu
        </h1>

        <p>
            Pandega Coffee menyajikan kopi Indonesia premium 
            dengan menjamin kualitas.
        </p>

        <div class="hero-buttons">
            <a href="#menu">
                <button class="btn-order" onclick="pindahKeHome()">
                     Order Sekarang
                </button>
            </a>

            <button class="btn-book" onclick="alert('Soon');">
                Pesan Meja
            </button>

            <script>
            function pindahKeHome() {
                const targetHome = document.querySelector('.home');
    
                if (targetHome) {
                    
                    targetHome.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
        }
}
</script>


        </div>

    </div>

</section>

        <section id="about">
            <h1>Tentang Saya</h1>
            <p>Pandega adalah seorang pemula yang baru belajar frontend.

                Dan sekarang dia telah membuat situs web kopi,

                Pandega Coffee adalah kedai kopi lokal yang menyajikan
                biji kopi premium Indonesia dengan kualitas terbaik.</p>
        </section>

        <section id="menu">
            <h2>Menu Kami</h2>
            <div class="menu-container">
            <ul id="menuList">
                <li>☕Espresso: 15000</li>
                <button id="Espresso">Espresso</button>
                <li>☕Latte: 25000</li>
                <button id="Latte">Late</button>
                <li>☕Cappucino: 40000</li>
                <button id="Cappucino">Cappucino</button>
                <li>☕Arabica: 24000</li>
                <button id="Arabica">Arabica</button>
                <li>☕Robusta: 50000</li>
                <button id="Robusta">Robusta</button>
                <li>☕Liberica: 40000</li>
                <button id="Liberica">Liberica</button>
                <li>🥛 Milk: 15000</li>
                <button id="Milk">Milk</button>
                <li>🍬 Sugar: 8000</li>
                <button id="Sugar">Sugar</button>
                <li>🧊 Ice Cube: 5000</li>
                <button id="Ice Cube">Ice Cube</button>
            </ul>
            </div>
        </section>

        <section id="cart">
            <h2>🛒 Keranjang</h2>
            <ul id="cartList">
            </ul>
            <h3 id="totalPrice">
                Total: Rp0
            </h3>
        </section>

        <section id="inventory">

    <h2>📦 Inventory</h2>

    <div class="inventory-container">

        <div class="inventory-card" data-stock="25">
    <h3>☕ Espresso</h3>
    <p>Stock: 25 Kg</p>
</div>

<div class="inventory-card" data-stock="65">
    <h3>☕ Latte</h3>
    <p>Stock: 65 Kg</p>
</div>

<div class="inventory-card" data-stock="45">
    <h3>☕ Cappuccino</h3>
    <p>Stock: 45 Kg</p>
</div>

<div class="inventory-card" data-stock="15">
    <h3>☕ Arabica</h3>
    <p>Stock: 15 Kg</p>
</div>

<div class="inventory-card" data-stock="10">
    <h3>☕ Robusta</h3>
    <p>Stock: 10 Kg</p>
</div>

<div class="inventory-card" data-stock="3">
    <h3>☕ Liberica</h3>
    <p>Stock: 3 Kg</p>
</div>

<div class="inventory-card" data-stock="20">
    <h3>🥛 Milk</h3>
    <p>Stock: 20 L</p>
</div>

<div class="inventory-card" data-stock="8">
    <h3>🍬 Sugar</h3>
    <p>Stock: 8 Kg</p>
</div>

<div class="inventory-card" data-stock="50">
    <h3>🧊 Ice Cube</h3>
    <p>Stock: 50 Kg</p>
</div>

    </div>

</section>
        <section id="task">
    <h2>Pelayanan</h2>

    <div class="task-container">
             <input
                 type="text"
                 id="taskInput"
                 placeholder="Masukan Perintah"
                 >
                 <button id="addTask">
                    Tambah Pelayanan
                 </button>
             </div>

            <ul id="taskList">
                <li>Bersihkan Meja</li>
                <li>Rapikan kursi</li>
                <li>Pelayan Datang Ke Kursi</li>
            </ul>
            <p id="status"></p>
        </section>

        <section id="contact">
            <h2>Hubungi</h2>
            <form>
                <p>Pandega Coffe</p>
                <p>📍 Purwokerto, Jawa Tengah
                    📱 +62 xxxx xxxx xxxx</p>
                <a href="mailto:lanzy@email.com">
                     📧 Email Kami
                </a>
                <a href="wa.me/6285601504359">WhatsApp</a>
            </form>
        </section>
    <footer>
        <p>© 2026 Pandega Coffee</p>
    </footer>
    <script src="assets/js/script.js"></script>
</body>
</html>