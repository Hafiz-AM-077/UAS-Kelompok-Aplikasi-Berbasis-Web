<?php
// Memulai sesi
session_start();

// Menghancurkan data sesi di disk
session_destroy();

// Menghapus cookie sesi
setcookie(session_name(), '', time() - 3600);

// Menghancurkan array $_SESSION
$_SESSION = array();

// Menetapkan judul halaman
$page_title = "Log Out";

// Sertakan header.php untuk bagian header
include('includes/header.php');
?>
<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Log Out</li>
    </ul>
    <h1 class="text-center">Logged Out</h1>
    <p class="lead text-center text-danger">Terima kasih atas kunjungan Anda. Anda sekarang telah keluar.</p>
</div>
<?php
// Alihkan ke index.php setelah beberapa detik
header("Refresh:1; url=index.php", true, 303);
// Sertakan footer.php untuk bagian footer
include('includes/footer.php');
?>
