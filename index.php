<?php
// Menetapkan judul halaman
$page_title = "MOVIEREV";

// Memasukkan header.php
include_once('includes/header.php');
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indikator Carousel -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    
    <!-- Isi Carousel -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="assets/img/spider.jpg" alt="First slide">
            <div class="jumbotron">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>MOVIE REV</h1>
                        <p>Welcome to the MOVIEREV Service!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="assets/img/itaewonclass.jpg" alt="Second slide">
            <div class="jumbotron">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Rate Movies</h1>
                        <p>Create an account to review your favorite movies</p>
                        <p><a class="btn btn-lg btn-info" href="registration.php" role="button">Sign up today</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="assets/img/boruto.png" alt="Third slide">
            <div class="jumbotron">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Read Reviews</h1>
                        <p>Browse all of our reviews and find out more about what others thought of your favorite movies!</p>
                        <p><a class="btn btn-lg btn-info" href="reviews.php" role="button">VIEW REVIEWS &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.carousel -->

<div class="container">
    <!-- Baris contoh kolom -->
    <div class="row">
        <div class="col-md-4">
            <h2>BUAT AKUN</h2>
            <p>Daftar untuk membuat akun dan tambahkan ulasan untuk film favorit Anda</p>
            <p><a class="btn btn-default" href="registration.php" role="button">DAFTAR &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>DAFTAR FILM</h2>
            <p>Jelajahi daftar panjang kami dari judul film beserta rating, tahun, sinopsis singkat, dan ulasan!</p>
            <p><a class="btn btn-default" href="movies.php" role="button">LIHAT FILM &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>DAFTAR ULASAN</h2>
            <p>Jelajahi semua ulasan kami dan temukan lebih banyak tentang pendapat orang lain tentang film favorit Anda!</p>
            <p><a class="btn btn-default" href="reviews.php" role="button">LIHAT ULASAN &raquo;</a></p>
        </div>
    </div>
</div> <!-- /container -->


<?php
// Memasukkan footer.php
include_once('includes/footer.php');
?>
