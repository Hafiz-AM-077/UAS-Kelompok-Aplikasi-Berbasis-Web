<?php
// Memulai sesi baru
session_start();

// Menetapkan judul halaman
$page_title = "Register New Account";

// Memanggil header.php untuk bagian header
require_once 'includes/header.php';
// Memanggil database.php untuk koneksi ke database
require_once 'includes/database.php';

// Mendapatkan nilai dari parameter URL
$user_name = $_GET['username'];
$full_name = $_GET['name'];
$user_email = $_GET['email'];
$password = $_GET['password'];
$role = 2;

// Menyiapkan pernyataan SQL untuk memeriksa apakah username dan password sudah terdaftar
$query_str = "SELECT * FROM users WHERE user_name='$user_name' AND user_password='$password'";

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

if ($result->num_rows == 0) {
    // Pernyataan INSERT untuk menambahkan pengguna baru
    $insert_query_str = "INSERT INTO users VALUES (NULL, '$user_name', '$full_name', '$user_email', '$password', '$role')";

    // Menjalankan query INSERT
    $insert_result = @$conn->query($insert_query_str);

    // Menjalankan query untuk mendapatkan informasi pengguna yang baru didaftarkan
    $new_user_query_str = "SELECT * FROM users WHERE user_name='$user_name'";
    $new_user_result = @$conn->query($new_user_query_str);
    
    // Mengambil data pengguna yang baru didaftarkan
    $result_row = $new_user_result->fetch_assoc();

    // Menetapkan variabel sesi untuk pengguna yang baru didaftarkan
    $_SESSION['login'] = $user_name;
    $_SESSION['role'] = $role;
    $_SESSION['name'] = $full_name;
    $_SESSION['id'] = $result_row['user_id'];

    // Mengupdate status login
    $login_status = 3;

    // Mengarahkan pengguna ke halaman useraccount.php setelah berhasil mendaftar
    header("Refresh:3; url=useraccount.php");
    ?>
    <div class="container wrapper">
        <h1 class="text-center text-success">You have successfully registered!</h1>
    </div>
<?php } else { ?>
    <div class="container wrapper">
        <h1 class="text-center text-danger">This username is already registered!</h1>
    </div>

<?php
    // Mengarahkan pengguna kembali ke halaman registration.php setelah gagal mendaftar
    header("Refresh:1; url=registration.php");
}

// Memanggil footer.php untuk bagian footer
include ('includes/footer.php');
?>
