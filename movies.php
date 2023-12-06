<?php

// Menetapkan judul halaman
$page_title = "Prutor.ai: Movies";

// Memanggil header.php untuk bagian header
require_once('includes/header.php');
// Memanggil database.php untuk koneksi ke database
require_once('includes/database.php');

// Pernyataan SELECT
$query_str = "SELECT * FROM movies";

// Eksekusi query
$result = $conn->query($query_str);

// Tangani kesalahan pemilihan
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else { // Menampilkan hasil dalam sebuah tabel
    ?>
    <div class="container wrapper">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Movies</li>
        </ul>
        <h1 class="text-center">Movies</h1>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-8">
                <form action="searchmovies.php" method="get" class="form-inline search-form" role="form">
                    <div class="input-group">
                        <label class="sr-only" for="movieSearch">Search Movies</label>
                        <div class="input-group-addon"><i class="fa fa-search fa-lg"></i></div>
                        <input type="text" name="movie" placeholder="Search" id="movieSearch" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Go!</button>
                </form>
            </div>
        </div>
        <div class="movie-list">
            <?php
            $i = 0;
            while ($result_row = $result->fetch_assoc()) :
                $i++;
                if ($i == 1) :
                    ?>
                    <div class="row">
                <?php endif; ?>
                <div class="col-xs-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <div class="text-center">
                                <a href="moviedetails.php?id=<?php echo $result_row['movie_id'] ?>">
                                    <img src="<?php echo $result_row['movie_img'] ?>" />
                                </a>
                            </div>
                            <h3 class="text-center">
                                <?php
                                echo "<a href='moviedetails.php?id=" . $result_row['movie_id'] . "'>", $result_row['movie_name'], "</a>";
                                ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php if ($i == 3) : ?>
                </div>
                <?php $i=0; endif; endwhile; ?>
        </div>
    </div>
    <?php
    // Membersihkan hasil setelah selesai menggunakannya!
    $result->close();
}

// Menutup koneksi.
$conn->close();

// Memanggil footer.php untuk bagian footer
include ('includes/footer.php');
?>
