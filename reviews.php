<?php
// Menetapkan judul halaman
$page_title = "Prutor.ai: Reviews";

// Memanggil header.php untuk bagian header
require_once('includes/header.php');
// Memanggil database.php untuk koneksi ke database
require_once('includes/database.php');

// Pernyataan SQL untuk mendapatkan semua data dari tabel movies
$query_str = "SELECT * FROM movies";
// Menjalankan query
$result = $conn->query($query_str);
?>

<div class="container wrapper">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Reviews</li>
    </ul>

    <h1 class="text-center">Reviews</h1>

    <?php
    // Looping melalui setiap baris data movies
    while ($movie_row = $result->fetch_assoc()):
        $movie_id = $movie_row['movie_id'];
        // Pernyataan SQL untuk mendapatkan ulasan berdasarkan ID film
        $review_str = "SELECT * FROM reviews WHERE review_movie_id='$movie_id'";
        // Menjalankan query ulasan
        $review_result = $conn->query($review_str);
        $review_row = $review_result->fetch_assoc();

        // Memeriksa apakah ada ulasan untuk film ini
        if ($review_row) { ?>
            <div class="row movie-list">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <!-- Menampilkan judul film sebagai tautan ke halaman moviedetails.php -->
                                <a href="moviedetails.php?id=<?= $movie_row['movie_id'] ?>"><?= $movie_row['movie_name'] ?></a>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            // Menjalankan ulang query ulasan untuk menampilkan setiap ulasan
                            $review_result = $conn->query($review_str);
                            while ($review_row = $review_result->fetch_assoc()) :
                                ?>
                                <!-- Menampilkan peringkat dan konten ulasan -->
                                <h4>Rating: <span class="<?php
                                    if ($review_row['review_rating'] >= 4 ){
                                        echo 'text-success';
                                    } elseif ( $review_row['review_rating'] < 2 ) {
                                        echo 'text-danger';
                                    }
                                    ?>"> <?=$review_row['review_rating'] ?></span></h4>
                                <p class="lead"><?= $review_row['review_content'] ?></p>
                            <?php endwhile ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } endwhile ?>
</div>

<?php
// Menutup koneksi ke database
$conn->close();

// Memanggil footer.php untuk bagian footer
include('includes/footer.php');
?>
