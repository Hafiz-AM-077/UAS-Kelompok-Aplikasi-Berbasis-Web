<?php

// Memulai sesi
session_start();

// Mengambil variabel sesi yang sudah ada dengan nama "cart"
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

// Menambahkan item baru ke dalam variabel sesi "cart"
if ($cart) {
    $cart .= ',' . $_GET['id'];
} else {
    $cart = $_GET['id'];
}

// Memperbarui variabel sesi dengan konten baru
$_SESSION['cart'] = $cart;

// Mengalihkan ke halaman useraccount.php
header('Location: useraccount.php');
