<?php
include "../koneksi.php";
session_start();
$nama = $_SESSION["nama"];
$tanggal = date("Y-m-d");

$id_produk = $_POST["id_produk"];
$email = $_POST["email"];
$user_game_id = $_POST["user_game_id"];

// Mengambil data produk berdasarkan id produk
$query = "SELECT * FROM produk JOIN game ON produk.id_game = game.id_game WHERE id_produk = $id_produk";
$ambilData = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($ambilData);

$nama_game = $data["nama_game"];
$nama_produk = $data["nama_produk"];
$harga_produk = $data["harga_produk"];

// Tambah data transaksi
$query = "INSERT INTO transaksi VALUES('', '$tanggal', '$user_game_id', '$nama', '$email', '$nama_game', '$nama_produk', '$harga_produk')";
$tambahData = mysqli_query($koneksi, $query);

// Mengambil id transaksi
$query = "SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC";
$cekData = mysqli_query($koneksi, $query);
$dataTransaksi = mysqli_fetch_array($cekData);
$id_transaksi = $dataTransaksi["id_transaksi"];

// Mengurangi jumlah produk
$query = "UPDATE produk SET jumlah_produk = jumlah_produk-1 WHERE id_produk = $id_produk";
$kurangData = mysqli_query($koneksi, $query);

header("location: loading/loading.php?id_transaksi=$id_transaksi");
