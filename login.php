<?php

// Sertakan kode dari database.php
require_once('includes/database.php');

// Inisialisasi variabel
$username = '';
$password = '';
$login_status = 2; // Default status login (2: Gagal)

// Periksa apakah form login telah disubmit
if (isset($_POST['username']))
    $username = trim($_POST['username']);
if (isset($_POST['password']))
    $password = trim($_POST['password']);

// Periksa apakah nama pengguna tidak kosong
if (!empty($username)) {
    // Pernyataan SQL SELECT
    $query_stry = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password'";

    // Jalankan query
    $result = @$conn->query($query_stry);

    // Periksa hasil query
    if ($result->num_rows) {
        // Ini adalah pengguna yang valid. Perlu menyimpan pengguna dalam Variabel Sesi
        session_start();
        $_SESSION['login'] = $username;
        $result_row = $result->fetch_assoc();
        $_SESSION['role'] = $result_row['user_role'];
        $_SESSION['name'] = $result_row['user_full_name'];
        $_SESSION['id'] = $result_row['user_id'];

        // Perbarui status login
        $login_status = 1; // 1: Berhasil
    }
}

// Alihkan ke halaman loginform.php dengan menyertakan status login
header("Location: loginform.php?ls=$login_status");

// Tutup koneksi
$conn->close();
