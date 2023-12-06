<?php
// Memulai sesi baru
session_start();

// Menetapkan judul halaman
$page_title = "Add Movie";

// Memanggil header.php untuk bagian header
require_once 'includes/header.php';
// Memanggil database.php untuk koneksi ke database
require_once 'includes/database.php';

// Mendapatkan nilai dari parameter URL
$title = $_GET['movie_name'];
$year = $_GET['movie_year'];
$bio = $_GET['bio'];
$rating = $_GET['rating'];
$image =  $_GET['image'];

// Menyusun pernyataan SQL
$query_str = "INSERT INTO movies VALUES (NULL, '$title', '$year', '$rating', '$bio', '$image')";

// Menjalankan query
$result = @$conn->query($query_str);

// Menangani kesalahan
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}

// Mengarahkan pengguna ke halaman movies.php setelah menambahkan film
header("Location: movies.php");
