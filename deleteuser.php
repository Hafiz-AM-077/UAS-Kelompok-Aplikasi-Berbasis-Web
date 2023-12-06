<?php

// Menetapkan judul halaman
$page_title = "Hapus Akun";

// Memanggil header.php untuk bagian header
require_once('includes/header.php');
require_once('includes/database.php');

// Mengambil ID pengguna dari parameter URL
$user_id = $_GET['id'];

// Menyusun pernyataan SQL untuk menghapus pengguna
$query_str = "DELETE FROM users WHERE user_id = '$user_id'";

// Menjalankan query
$result = $conn->query($query_str);

// Menangani kesalahan pemilihan
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Pemilihan gagal dengan: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
?>
  
<div class="container wrapper">
    <h1 class="text-center text-danger">Akun Anda telah dihapus</h1>
</div>

<?php
// Memulai sesi
@session_start();

// Menghancurkan data sesi di disk
session_destroy();

// Menghapus cookie sesi
setcookie(session_name(), '', time() - 3600);

// Menghancurkan array $_SESSION
$_SESSION = array();

// Mengalihkan ke halaman index.php setelah beberapa detik
header("Refresh:3; url=index.php", true, 303);

// Menutup koneksi
$conn->close();

// Memanggil footer.php untuk bagian footer
include('includes/footer.php');
?>
