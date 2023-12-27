<?php
include_once "../../koneksi.php";

// Mengambil data kategori
$query = "SELECT * FROM kategori";
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
            <h3>Tambah Data Game Baru</h3>
            <div class="col-md-8">
                <div class="card card-body">
                    <form action="insert_game.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_game" class="form-label text-dark">Nama game</label>
                            <input type="text" class="form-control text-dark text-dark" name="nama_game" placeholder="Nama game" id="nama_game" />
                        </div>
                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label text-dark">Nama Perusahaan</label>
                            <input type="text" class="form-control text-dark" name="nama_perusahaan" placeholder="Nama Perusahaan" id="nama_perusahaan" />
                        </div>
                        <div class="mb-3">
                            <label for="gambar_game" class="form-label text-dark">Gambar Game</label>
                            <input type="file" class="form-control text-dark" name="gambar_game" id="gambar_game" />
                        </div>
                        <div class="mb-3">
                            <label for="gambar_detail_game" class="form-label text-dark">Gambar Detail Game</label>
                            <input type="file" class="form-control text-dark" name="gambar_detail_game" id="gambar_detail_game" />
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label text-dark">Kategori Game</label>
                            <select name="kategori" class="form-select mb-2" required id="kategori">
                                <option value="" disabled selected>Pilih Kategori</option>
                                <?php while ($dataKategori = mysqli_fetch_assoc($cekData)) : ?>
                                    <option value="<?= $dataKategori["id_kategori"] ?>">
                                        <?= $dataKategori["nama_kategori"] ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>