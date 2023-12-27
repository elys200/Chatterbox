<?php
include_once "../../koneksi.php";

// Mengecek apakah ada form yang dikirim
if ($_POST) {
    // Mengambil data input
    $id_produk = $_POST["id_produk"];
    $nama_produk = $_POST["nama_produk"];
    $harga_produk = $_POST["harga_produk"];
    $jumlah_produk = $_POST["jumlah_produk"];
    $id_game = $_POST["game"];

    $query = "UPDATE produk SET nama_produk = '$nama_produk', harga_produk = '$harga_produk', jumlah_produk = '$jumlah_produk', id_game = '$id_game' WHERE id_produk = $id_produk";

    // Mengedit data ke database
    $result = mysqli_query($koneksi, $query);
    header("location: produk.php");
} else {
    header("location: produk.php");
}
