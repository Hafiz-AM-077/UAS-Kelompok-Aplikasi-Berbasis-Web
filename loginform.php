<?php
$page_title = "Login";
$login_status = "";

/**
 * Deskripsi:
 * Periksa status login:
 * 1 -- percobaan login terakhir berhasil
 * 2 -- percobaan login terakhir gagal.
 * 3 -- pengguna baru saja terdaftar. Masuk secara otomatis.
 * other -- percobaan login baru
 */

// Sertakan header.php untuk bagian header
require_once('includes/header.php');
?>

<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Log In</li>
    </ul>
    <div class="col-xs-6 col-xs-offset-2">
        <?php
        // Periksa apakah status login telah diset
        if (isset($_GET['ls'])) {
            $login_status = $_GET['ls'];

            if ($login_status == 1) {
                echo "<p class='lead'>Anda masuk sebagai <span class='text-success text-uppercase'>", $_SESSION['login'], "</span></p>";
                echo "<a class='btn btn-danger' href='logout.php'>LOG OUT</a><br>";
                // Alihkan ke useraccount.php setelah beberapa detik
                header("Refresh:1; url=useraccount.php", true, 303);
            } elseif ($login_status == 2) {
                echo "<h1>Login</h1>";
                echo "<p class='lead text-danger'>Kombinasi nama pengguna/kata sandi salah.</p>";
            } elseif ($login_status == 3) {
                echo "<h1>Login</h1>";
                echo "<p class='lead text-success'>Terima kasih. Akun Anda telah dibuat.</p>";
                echo "<a class='btn btn-danger' href='logout.php'>LOG OUT</a><br>";
                // Alihkan ke useraccount.php setelah beberapa detik
                header("Refresh:3; url=useraccount.php", true, 303);
            }
        } else {
            echo "<p class='lead'>Anda tidak masuk. Silakan login atau <a href='registrationform.php'>buat</a> akun baru</p>";
        }

        // Periksa apakah status login bukan 1 atau 3 (tidak berhasil atau baru)
        if ($login_status != 1 && $login_status != 3) { ?>
            <!-- Form login -->
            <form class="form-horizontal" role="form" action="login.php" method="post">
                <div class="form-group">
                    <label for="newUserName" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="newUserName" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="newPassword" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">SIGN IN</button>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>

<?php
// Sertakan footer.php untuk bagian footer
include('includes/footer.php');
?>
