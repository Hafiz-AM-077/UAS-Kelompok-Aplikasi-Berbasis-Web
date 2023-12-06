<?php

// Menetapkan judul halaman
$page_title = "Prutor.ai";

// Memanggil header.php untuk bagian header
require_once('includes/header.php');
require_once('includes/database.php');

// Mengambil informasi dari parameter URL
$user_id = $session_id;
$movie_id = $_GET['movie_id'];
$review_rating = $_GET['review_rating'];

// Menghindari SQL Injection dengan membersihkan review_content
$review_string = $_GET['review_content'];
$review_content = mysqli_real_escape_string($conn, $review_string);

// Mendefinisikan statement SQL
$query_str = "INSERT INTO reviews VALUES (NULL, '$movie_id', '$user_id', '$review_rating', '$review_content')";

// Menjalankan query
$result = @$conn->query($query_str);
?>

<div class="container wrapper">

    <ul class="breadcrumb">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="movies.php">Film</a></li>
        <li class="active">Menambah Ulasan</li>
    </ul>

    <h1 class="text-center">Tambah Ulasan</h1>

    <?php
    // Menangani kesalahan saat penyisipan data
    if (!$result) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Penyisipan gagal dengan kode kesalahan $errno dan pesan kesalahan: $errmsg<br/>\n";
        $conn->close();
        exit;
    } else {
    ?>
        <div class="container wrapper">
            <h1 class="text-center text-success">Ulasan Anda telah ditambahkan!</h1>
        </div>
    <?php
        $conn->close();
    }
    // Mengalihkan ke halaman moviedetails.php setelah beberapa detik
    header("Refresh:1; url=moviedetails.php?id=$movie_id", true, 303);
    // Memanggil footer.php untuk bagian footer
    include_once('includes/footer.php');
    ?>
