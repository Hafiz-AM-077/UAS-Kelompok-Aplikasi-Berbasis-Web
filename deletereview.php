<?php

// Menetapkan judul halaman
$page_title = "Hapus Ulasan";

// Memanggil header.php untuk bagian header
require_once('includes/header.php');
require_once('includes/database.php');

// Mengambil ID ulasan dari parameter URL
$review_id = $_GET['id'];

// Menyusun pernyataan SQL untuk menghapus ulasan
$query_str = "DELETE FROM reviews WHERE review_id = '$review_id'";

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
    <h1 class="text-center text-danger">Ulasan Anda telah dihapus</h1>
</div>

<?php
// Mengalihkan ke halaman useraccount.php setelah beberapa detik
header("Refresh:1; url=useraccount.php", true, 303);
// Menutup koneksi
$conn->close();
// Memanggil footer.php untuk bagian footer
include('includes/footer.php');
?>
