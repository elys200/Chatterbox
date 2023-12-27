<?php
include_once "../../koneksi.php";

// Mengambil data game
$query = "SELECT * FROM game JOIN kategori ON game.id_kategori = kategori.id_kategori ORDER BY id_game DESC";
$cekData = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <li class="active">
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
            <h3>List Game</h3>
            <a href="tambah_game.php" class="btn btn-primary">Tambah</a>
            <div class="tabular--wrapper">
                <table class="table table-bordered table-dark text-center" id="tabel-game">
                    <thead>
                        <tr>
                            <td>NO</td>
                            <td>NAMA GAME</td>
                            <td>NAMA PERUSAHAAN</td>
                            <td>GAMBAR GAME</td>
                            <td>GAMBAR DETAIL GAME</td>
                            <td>KATEGORI</td>
                            <td>AKSI</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        // Menampilkan semua data game
                        while ($dataGame = mysqli_fetch_assoc($cekData)) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $dataGame["nama_game"] ?>
                                </td>
                                <td>
                                    <?= $dataGame["nama_perusahaan"] ?>
                                </td>
                                <td><img src="../../assets/img/game/<?= $dataGame["gambar_game"] ?>" width="100">
                                <td><img src="../../assets/img/detail_game/<?= $dataGame["gambar_detail"] ?>" width="100">
                                </td>
                                <td>
                                    <?= $dataGame["nama_kategori"] ?>
                                </td>
                                <td>
                                    <a href="edit_game.php?id=<?= $dataGame["id_game"] ?>" class="btn btn-warning">Edit</a>
                                    <a href="hapus_game.php?id=<?= $dataGame["id_game"] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>