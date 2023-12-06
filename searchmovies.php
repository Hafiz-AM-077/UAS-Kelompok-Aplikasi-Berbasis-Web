<?php
// Menetapkan judul halaman
$page_title = "Prutor.ai: Movies";

// Memanggil header.php untuk bagian header
require_once('includes/header.php');
// Memanggil database.php untuk koneksi ke database
require_once('includes/database.php');

// Mendapatkan nilai dari parameter URL 'movie'
$name = $_GET['movie'];

// Pernyataan SQL untuk mencari film berdasarkan nama atau deskripsi yang cocok dengan nilai 'movie'
$query_str = "SELECT * FROM $tblMovies WHERE movie_name LIKE '%" . $name . "%' OR movie_bio LIKE '%" . $name . "%'";

// Menjalankan query
$result = $conn->query($query_str);

// Menangani kesalahan pemilihan
if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} else { // Menampilkan hasil dalam bentuk tabel
    ?>
    <div class="container wrapper">

        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li class="active">Search Results</li>
        </ul>

        <h1 class="text-center">Search Results</h1>

        <div class="row">
            <div class="col-xs-4 col-xs-offset-8">
                <form action="<?=$_SERVER['PHP_SELF']?>" class="form-inline search-form" method="get" role="form">
                    <div class="input-group">
                        <label class="sr-only" for="movieSearch">Search Movies</label>
                        <div class="input-group-addon"><i class="fa fa-search fa-lg"></i></div>
                        <input type="text" name="movie" placeholder="Search" id="movieSearch" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Go!</button>
                </form>
            </div>
        </div>

    <?php 
        // Mendapatkan jumlah baris hasil
        $num_rows = mysqli_num_rows($result);

        // Memeriksa apakah ada hasil yang ditemukan
        if ($num_rows == 0) {
            echo "<p class='lead text-center'>No results found for <strong>". $name . "</strong>. Please search again.</p>";
        } else {
            // Menampilkan setiap baris data sebagai thumbnail dalam bentuk grid
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
                                    <!-- Menampilkan gambar film sebagai tautan ke halaman moviedetails.php -->
                                    <a href="moviedetails.php?id=<?php echo $result_row['movie_id']?>">
                                        <img src="<?php echo $result_row['movie_img'] ?>" />
                                    </a>
                                </div>
                                <h3 class="text-center">
                                    <?php
                                    // Menampilkan judul film sebagai tautan ke halaman moviedetails.php
                                    echo "<a href='moviedetails.php?id=" . $result_row['movie_id'] . "'>", $result_row['movie_name'], "</a>";
                                    ?>
                                </h3>
                                <p class="lead text-center"><?php echo $result_row['movie_bio'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php if ($i == 3) : ?>
                    </div>
                <?php $i=0; endif; endwhile; ?>
            </div>
        <?php
        }

        // Membersihkan hasil setelah selesai menggunakannya
        $result->close();
    }

    // Menutup koneksi ke database
    $conn->close();

    // Memanggil footer.php untuk bagian footer
    include ('includes/footer.php');
?>
