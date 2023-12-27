<?php
include_once "../../koneksi.php";

// Mengambil data kategori
$query = "SELECT id_game,nama_game FROM game";
$cekData = mysqli_query($koneksi, $query);
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
                    <a href="../game/game.php">
                        <i class="fa-solid fa-gamepad"></i>
                        <span>Game</span>
                    </a>
                </li>
                <li>
                    <a href="produk.php">
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
            <h3>Tambah Data Produk</h3>
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="insert_produk.php" method="POST">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label text-dark">Nama Produk</label>
                            <input type="text" name="nama_produk" id="nama_produk" class="form-control mb-2 text-dark" placeholder="Nama Produk" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga_produk" class="form-label text-dark">Harga Produk</label>
                            <input type="number" name="harga_produk" id="harga_produk" class="form-control mb-2 text-dark" placeholder="Harga Produk" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_produk" class="form-label text-dark">Jumlah Produk</label>
                            <input type="number" name="jumlah_produk" id="jumlah_produk" class="form-control mb-2 text-dark" placeholder="Jumlah Produk" required>
                        </div>
                        <div class="mb-3">
                            <label for="game" class="form-label text-dark">Nama Game</label>
                            <select name="game" id="game" class="form-select mb-2" required>
                                <option value="" disabled selected>Pilih Game</option>
                                <?php while ($dataKategori = mysqli_fetch_assoc($cekData)) : ?>
                                    <option value="<?= $dataKategori["id_game"] ?>">
                                        <?= $dataKategori["nama_game"] ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>