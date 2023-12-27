<?php
include "../../koneksi.php";

// Mengecek apakah ada form yang dikirim
if ($_POST) {
    // Mengambil inputan
    $nama_game = $_POST["nama_game"];
    $nama_perusahaan = $_POST["nama_perusahaan"];
    $id_kategori = $_POST["kategori"];
    $nama_gambar = $_FILES["gambar_game"]["name"];
    $tmp_gambar = $_FILES["gambar_game"]["tmp_name"];
    $nama_detail_gambar = $_FILES["gambar_detail_game"]["name"];
    $tmp_detail_gambar = $_FILES["gambar_detail_game"]["tmp_name"];

    // Memasukkan file gambar ke folder
    move_uploaded_file($tmp_gambar, "../../assets/img/game/$nama_gambar");
    move_uploaded_file($tmp_detail_gambar, "../../assets/img/detail_game/$nama_detail_gambar");

    // Memasukkan data ke database
    $query = "INSERT INTO game VALUES('', '$nama_game', '$nama_perusahaan', '$nama_gambar', '$nama_detail_gambar', '$id_kategori')";
    $result = mysqli_query($koneksi, $query);

    // Mengecek apakah data masuk atau tidak
    if ($result) {
        header("location: game.php");
    } else {
        echo "<script>alert('Gagal')</script>";
        header("location: tambah_game.php");
    }
} else {
    header("location: game.php");
}
