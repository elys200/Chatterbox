<?php
include_once "../../koneksi.php";

// Mengambil id dari URL
$id_game = $_GET["id"];

// Mengambil data sesuai id
$query = "SELECT * FROM game WHERE id_game = $id_game";
$cekData = mysqli_query($koneksi, $query);
$dataGame = mysqli_fetch_assoc($cekData);

// Mengambil data kategori
$queryKategori = "SELECT * FROM kategori";
$cekDataKategori = mysqli_query($koneksi, $queryKategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Game</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://kit.fontawesome.com/9dc5416d74.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="sidebar">
        <br>
        <br>
        <div class="profile">
            <img src="../../assets/img/info.jpg" alt="">
            <span>Admin</span>
        </div>
        <div class="logo">
            <ul class="menu">
                <li class="active">
                    <a href="#" style="cursor: default">
                        <span class="mx-auto">Penjual</span>
                    </a>
                </li>
                <li>
                    <a href="../index.php">
                        <i class="fa-solid fa-house"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="game.php">
                        <i class="fa-solid fa-gamepad"></i>
                        <span>Game</span>
                    </a>
                </li>
                <li>
                    <a href="../produk/produk.php">
                        <i class="fa-solid fa-plus"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="../rekapan.php">
                        <i class="fa-solid fa-file"></i>
                        <span>Rekapan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--tittle">
                <h2>Dashboard</h2>
            </div>
            <div class="user--info">
                <a href="../../logout.php" class="text-decoration-none text-white">LOGOUT</a>
            </div>
        </div>
        <div class="card--container">
            <h3>Edit Data Game</h3>
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="update_game.php" method="POST" enctype="multipart/form-data">
                        <!-- Mengirim data tersembunyi -->
                        <input type="hidden" name="gambar_lama" value="<?= $dataGame["gambar_game"] ?>">
                        <input type="hidden" name="detail_gambar_lama" value="<?= $dataGame["gambar_detail"] ?>">
                        <input type="hidden" name="id_game" value="<?= $id_game ?>">

                        <label for="nama_game" class="form-label text-dark">Nama game</label>
                        <input type="text" name="nama_game" class="form-control mb-2 text-dark" placeholder="Nama Game"
                            value="<?= $dataGame["nama_game"] ?>" required id="nama_game">

                        <label for="nama_perusahaan" class="form-label text-dark">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control mb-2 text-dark"
                            placeholder="Nama Perusahaan" value="<?= $dataGame["nama_perusahaan"] ?>" required
                            id="nama_perusahaan">

                        <label for="gambar_game" class="form-label text-dark">Gambar game</label>
                        <input type="file" name="gambar_game" class="form-control mb-2 text-dark" id="gambar_game">

                        <img src="../../assets/img/game/<?= $dataGame["gambar_game"] ?>" alt="" width="100">

                        <label for="gambar_detail_game" class="form-label text-dark mt-3">Gambar Detail game</label>
                        <input type="file" name="gambar_detail_game" class="form-control mb-2 text-dark"
                            id="gambar_detail_game">

                        <img src="../../assets/img/detail_game/<?= $dataGame["gambar_detail"] ?>" alt="" width="100">

                        <label for="kategori" class="form-label text-dark mt-3">Kategori Game</label>
                        <select name="kategori" class="form-select mb-2 text-dark">
                            <?php while ($dataKategori = mysqli_fetch_assoc($cekDataKategori)) : ?>
                            <option value="<?= $dataKategori["id_kategori"] ?>"
                                <?php if ($dataGame["id_kategori"] == $dataKategori["id_kategori"]) { ?> selected
                                <?php } ?>>
                                <?= $dataKategori["nama_kategori"] ?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                        <button type="submit" class="btn btn-primary mb-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>