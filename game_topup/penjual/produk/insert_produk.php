<?php
include "../../koneksi.php";

// Mengecek apakah ada form yang dikirim
if ($_POST) {
    // Mengambil inputan
    $id_game = $_POST["game"];
    $nama_produk = $_POST["nama_produk"];
    $harga_produk = $_POST["harga_produk"];
    $jumlah_produk = $_POST["jumlah_produk"];

    // Memasukkan data ke database
    $query = "INSERT INTO produk VALUES('', '$nama_produk', '$harga_produk', '$jumlah_produk', '$id_game')";
    $result = mysqli_query($koneksi, $query);

    // Mengecek apakah data masuk atau tidak
    if ($result) {
        header("location: produk.php");
    } else {
        echo "<script>alert('Gagal')</script>";
        header("location: produk.php");
    }
} else {
    header("location: produk.php");
}
