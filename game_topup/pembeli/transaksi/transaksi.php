<?php
include "../../koneksi.php";

// Mengambil id transaksi dari url
$id_transaksi = $_GET["id_transaksi"];

// Mengambil data transaksi
$query = "SELECT * FROM transaksi WHERE id_transaksi = $id_transaksi";
$cekData = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($cekData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transaksi</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      background: url("image/transaksi.jpeg") no-repeat;
      background-size: 100%;
    }
  </style>
</head>

<body>
  <br /><br />
  <div class="container">
    <h3>Transaksi Berhasil</h3>
    <br /><br />
    <div class="image-container">
      <img src="image/centang.png" alt="" class="image" />
    </div>
    <h4 class="harga">IDR <?= number_format($data["harga_produk"], 0, ",", ".") ?></h4>
    <div class="table">
      <h4>Nama Game : <?= $data["nama_game"] ?></h4>
      <h4>ID Game : <?= $data["user_game_id"] ?></h4>
      <h4>Item : <?= $data["nama_produk"] ?></h4>
      <h4>Email : <?= $data["email_pembeli"] ?></h4>
    </div>
    <br /><br />
    <a href="../game.php">
      <button><span>Tutup</span></button>
    </a>
  </div>
</body>

</html>