<?php
// Mendefinisikan parameter-parameter
$host = "localhost"; // Alamat host MySQL
$port = null; // Port dapat diisi sesuai kebutuhan, biasanya 3306
$login = "root"; // Nama pengguna MySQL
$password = ''; // Kata sandi MySQL
$database = "movierev"; // Nama basis data MySQL
$tblMovies = "movies"; // Nama tabel untuk data film
$tblUsers = "users"; // Nama tabel untuk data pengguna
$tblReviews = "reviews"; // Nama tabel untuk data ulasan

// Menghubungkan ke server MySQL
$conn = @new mysqli($host, $login, $password, $database, $port);

// Menangani kesalahan koneksi
if (mysqli_connect_errno() != 0) {
    $errno = mysqli_connect_errno();
    $errmsg = mysqli_connect_error();
    die("Koneksi Gagal dengan: ($errno) $errmsg<br/>\n");
}
?>
