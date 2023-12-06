<?php

// Memanggil file database.php untuk koneksi database
require_once('includes/database.php');

// Menetapkan judul halaman
$page_title = "Tambah Film";

// Memanggil header.php untuk bagian header
require_once('includes/header.php');

?>
<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Beranda</a></li>
        <li class="active">Tambah Film</li>
    </ul>

    <h1 class="text-center">TAMBAH FILM</h1>
    <p class="lead text-center">Silakan tambahkan film yang diinginkan</p>
    <div class="col-xs-8 col-xs-offset-2">
        <form class="form-horizontal" role="form" action="processmovie.php" method="get" enctype="text/plain">
            <div class="form-group">
                <label for="newMovieName" class="col-sm-3 control-label">Judul</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="newMovieName" name="movie_name" placeholder="Judul Film" required>
                </div>
            </div>
            <div class="form-group">
                <label for="movieYear" class="col-sm-3 control-label">Tahun</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="movieYear" name="movie_year" placeholder="Tahun" required>
                </div>
            </div>
            <div class="form-group">
                <label for="movieBio" class="col-sm-3 control-label">Sinopsis</label>
                <div class="col-sm-9">
                    <textarea type="email" class="form-control" id="movieBio" name="bio" rows="4" placeholder="Masukkan Sinopsis" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="newImage" class="col-sm-3 control-label">URL Sampul Film</label>
                <div class="col-sm-9">
                    <input type="text" id="newImage" class="form-control" name="image" placeholder="Masukkan URL" required>
                </div>
            </div>
            <div class="form-group">
                <label for="movieRating" class="col-sm-3 control-label">Rating</label>
                <div class="col-sm-9">
                    <select id="movieRating" name="rating" class="form-control" required>
                        <option value="Dewasa 21+">Dewasa 21+</option>
                        <option value="18+">18+</option>
                        <option value="Remaja 13+">Remaja 13+</option>
                        <option value="Anak-anak">Anak-anak</option>
                        <option value="Tidak Ada Batasan Umur">Tidak Ada Batasan Umur</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-success">Tambah Film</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
// Memanggil footer.php untuk bagian footer
include('includes/footer.php');
?>
