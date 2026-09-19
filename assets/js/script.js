// Menggunakan querySelector agar pencarian ID lebih aman (tidak sensitif huruf besar/kecil pada selector tertentu)
const cartList = document.getElementById("cartList") || document.getElementById("cartlist");
const totalPrice = document.getElementById("totalPrice") || document.getElementById("totalprice");

let total = 0;

function addToCart(name, price) {
    // Memastikan elemen keranjang ditemukan di halaman sebelum memasukkan data
    if (!cartList || !totalPrice) {
        console.error("Elemen keranjang (cartList/totalPrice) tidak ditemukan di HTML!");
        return;
    }

    const li = document.createElement("li");
    li.textContent = `${name} - Rp ${price.toLocaleString('id-ID')}`;
    cartList.appendChild(li);

    total += price;
    totalPrice.textContent = `Total: Rp ${total.toLocaleString('id-ID')}`;
}

// Menangkap semua klik di area menuList dengan aman
const menuArea = document.getElementById("menuList") || document.getElementById("menulist");

if (menuArea) {
    menuArea.addEventListener("click", function(event) {
        // Memastikan elemen yang diklik adalah tombol penambah keranjang
        if (event.target.classList.contains('btn-add-cart')) {
            const tombol = event.target;
            
            // Ambil data nama dan harga dari atribut tombol
            const namaMenu = tombol.getAttribute('data-name');
            const hargaMenu = parseInt(tombol.getAttribute('data-price'), 10);

            // Jalankan fungsi masukkan ke keranjang belanja
            addToCart(namaMenu, hargaMenu);
            alert(`${namaMenu} berhasil ditambahkan ke keranjang! ☕`);
        }
    });
} else {
    console.error("Elemen menuList tidak ditemukan di halaman ini!");
}



const taskInput = document.getElementById("taskInput");
const addTask = document.getElementById("addTask");
const taskList = document.getElementById("taskList");
const status = document.getElementById("status");

addTask.addEventListener("click", () => {

    if (taskInput.value.trim() === "") {
        alert("Masukkan tugas terlebih dahulu!");
        return;
    }

    const li = document.createElement("li");

    const span = document.createElement("span");
    span.textContent = "⏳ " + taskInput.value;

    li.appendChild(span);

    // Complete Task
    span.addEventListener("click", () => {

        span.classList.toggle("completed");

        if (span.classList.contains("completed")) {

            span.textContent =
                "✅ " + taskInput.value;

            status.textContent =
                "✅ Task berhasil diselesaikan! Wait 5 Sec";

        } else {

            span.textContent =
                "⏳ " + taskInput.value;

            status.textContent =
                "⏳ Task dikembalikan ke pending.";

        }

        // Hilangkan status setelah 3 detik
        setTimeout(() => {
            status.textContent = "";
        }, 5000);

    });

    // Tombol Hapus
    const deleteBtn = document.createElement("button");

    deleteBtn.textContent = "🗑";

    deleteBtn.classList.add("delete-btn");

    deleteBtn.addEventListener("click", () => {

        li.remove();

        status.textContent =
            "🗑 Task berhasil dihapus.";

        setTimeout(() => {
            status.textContent = "";
        }, 5000);

    });

    li.appendChild(deleteBtn);

    taskList.appendChild(li);

    taskInput.value = "";

});

const inventoryCards =
    document.querySelectorAll(".inventory-card");

inventoryCards.forEach(card => {

    const stock =
        parseInt(card.dataset.stock);

    if (stock < 20) {

        card.classList.add("low-stock");

    }

});