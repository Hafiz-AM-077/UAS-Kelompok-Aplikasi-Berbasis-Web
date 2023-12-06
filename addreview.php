<?php

// Menetapkan judul halaman
$page_title = "MovieRev";

// Memanggil header.php untuk bagian header
require_once('includes/header.php');
require_once('includes/database.php');

// Mengambil parameter id dari URL
$movie_id = $_GET['id'];

?>

<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="movies.php">Film</a></li>
        <li class="active">Menambah Ulasan</li>
    </ul>

    <h1 class="text-center">Tambah Ulasan</h1>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-2">
            <form action="createreview.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>"/>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-right" for="addRating">Tambah Rating</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="review_rating" id="addRating" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="1">6</option>
                            <option value="2">7</option>
                            <option value="3">8</option>
                            <option value="4">9</option>
                            <option value="5">10</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label text-right" for="addReview">Teks Ulasan</label>
                    <div class="col-sm-9">
                        <textarea name="review_content" placeholder="Tulis Ulasan" id="addReview"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary">Tambah!</button>
                </div>
            </form>
        </div>
    </div>

</div>

<?php

// Menutup koneksi.
$conn->close();

// Memanggil footer.php untuk bagian footer
include_once('includes/footer.php');
?>
