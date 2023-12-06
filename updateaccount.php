<?php
/*
 * Kode ini digunakan untuk mengubah data pengguna (user details) dalam database.
 */

// Menetapkan judul halaman
$page_title = "Update user details";

// Memanggil header.php untuk bagian header
require_once('includes/header.php');
// Memanggil database.php untuk koneksi ke database
require_once('includes/database.php');

// Mendapatkan nilai dari parameter URL
$user_id = $_GET['id'];
$user_name = $_GET['username'];
$full_name = $_GET['name'];
$user_email = $_GET['email'];
$password = $_GET['password'];

// Pernyataan SQL untuk mengupdate data pengguna berdasarkan ID
$query_str = "UPDATE users SET
    user_name='$user_name',
    user_full_name='$full_name',
    user_email='$user_email',
    user_password='$password'
    WHERE user_id='$user_id'";

// Menjalankan query update
$result = @$conn->query($query_str);

// Menangani kesalahan pemilihan
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    exit;
} else {
    ?>
    <div class="container wrapper">
        <h2 class="text-center text-success">Your account has been updated</h2>
    </div>

    <?php
    // Pernyataan SQL select untuk mendapatkan informasi pengguna yang baru diupdate
    $query = "SELECT * FROM users WHERE user_name='$user_name' AND user_password='$password'";

    // Menjalankan query select
    $result = @$conn->query($query);

    // Memeriksa apakah ada hasil yang ditemukan
    if ($result->num_rows) {
        // Menghapus sesi yang ada
        session_destroy();
        // Memulai sesi baru
        session_start();
        // Menyimpan informasi pengguna dalam variabel sesi
        $_SESSION['login'] = $user_name;
        $result_row = $result->fetch_assoc();
        $_SESSION['role'] = $result_row['user_role'];
        $_SESSION['name'] = $result_row['user_full_name'];
        $_SESSION['id'] = $result_row['user_id'];
        // Memperbarui status login
        $login_status = 1;
    }

    // Mengarahkan pengguna ke halaman useraccount.php setelah berhasil diupdate
    header("Refresh:1; url=useraccount.php", true, 303);
}

// Menutup koneksi ke database
$conn->close();

// Memanggil footer.php untuk bagian footer
include ('includes/footer.php');
?>
