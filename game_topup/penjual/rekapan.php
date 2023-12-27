<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/9dc5416d74.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <br>
        <br>
        <div class="profile">
            <img src="../assets/img/info.jpg" alt="">
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
                    <a href="index.php">
                        <i class="fa-solid fa-house"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="game/game.php">
                        <i class="fa-solid fa-gamepad"></i>
                        <span>Game</span>
                    </a>
                </li>
                <li>
                    <a href="produk/produk.php">
                        <i class="fa-solid fa-plus"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li class="active">
                    <a href="rekapan.php">
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
                <a href="../logout.php" class="text-decoration-none text-white">LOGOUT</a>
            </div>
        </div>
        <div class="card--container">
            <h3>Rekapan</h3><br>
            <div class="tabular--wrapper">
                <div class="table--container">
                    <table class="table table-bordered table-dark text-center">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Pembeli</th>
                                <th>Email Pembeli</th>
                                <th>ID Game</th>
                                <th>Nama Game</th>
                                <th>Item</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../koneksi.php";
                            $query = "SELECT * FROM transaksi";
                            $cekData = mysqli_query($koneksi, $query);
                            $no = 1;
                            while ($row = mysqli_fetch_array($cekData)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row["nama_pembeli"] ?></td>
                                    <td><?= $row["email_pembeli"] ?></td>
                                    <td><?= $row["user_game_id"] ?></td>
                                    <td><?= $row["nama_game"] ?></td>
                                    <td><?= $row["nama_produk"] ?></td>
                                    <td>Rp<?= number_format($row["harga_produk"], 0, ",", ".") ?></td>
                                    <td><?= $row["tanggal"] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>