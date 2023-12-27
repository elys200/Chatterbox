<?php
include_once "../../koneksi.php";

// Mengambil id game dari URL
$id_game = $_GET["id"];

// Mengambil nama gambar dari database sesuai id
$queryGambar = "SELECT gambar_game FROM game WHERE id_game = $id_game";
$cekData = mysqli_query($koneksi, $queryGambar);
$dataGambar = mysqli_fetch_assoc($cekData);

$nama_gambar = $dataGambar["gambar_game"];
$nama_detail_gambar = $dataGambar["gambar_detail"];

// Menghapus gambar dari folder
unlink("../../assets/img/game/$nama_gambar");
unlink("../../assets/img/detail_game/$nama_detail_gambar");

// Menghapus data game dari database
$query = "DELETE FROM game WHERE id_game = $id_game";
$result = mysqli_query($koneksi, $query);
header("location: game.php");
