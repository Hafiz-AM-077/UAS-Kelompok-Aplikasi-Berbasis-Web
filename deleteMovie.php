<?php

// Menetapkan judul halaman
$page_title = "Hapus Film";

// Memanggil header.php untuk bagian header
require_once('includes/header.php');
require_once('includes/database.php');

// Mengambil ID film dari parameter URL
$movie_id = $_GET['id'];

// Menyusun pernyataan SQL untuk menghapus film
$query_str = "DELETE FROM movies WHERE movie_id = '$movie_id'";

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
    <div class="h1 text-danger text-center">Film telah dihapus.</div>
</div>

<?php
// Menutup koneksi
$conn->close();
// Mengalihkan ke halaman index.php setelah beberapa detik
header("Refresh:1; url=index.php", true, 303);
// Memanggil footer.php untuk bagian footer
include('includes/footer.php');
?>
