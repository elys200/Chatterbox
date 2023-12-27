<?php
include_once "../../koneksi.php";

// Mengecek apakah ada form yang dikirim
if ($_POST) {
    // Mengambil data input
    $id_game = $_POST["id_game"];
    $nama_game = $_POST["nama_game"];
    $nama_perusahaan = $_POST["nama_perusahaan"];
    $gambar_lama = $_POST["gambar_lama"];
    $detail_gambar_lama = $_POST["detail_gambar_lama"];
    $id_kategori = $_POST["kategori"];
    $nama_gambar = $_FILES["gambar_game"]["name"];
    $tmp_gambar = $_FILES["gambar_game"]["tmp_name"];
    $nama_detail_gambar = $_FILES["gambar_game"]["name"];
    $tmp_detail_gambar = $_FILES["gambar_game"]["tmp_name"];

    if ($nama_gambar == "" and $nama_detail_gambar == "") {
        // query ketika menggunakan gambar lama
        $query = "UPDATE game SET nama_game = '$nama_game', nama_perusahaan = '$nama_perusahaan', id_kategori = $id_kategori WHERE id_game = $id_game";
    } else {
        // Menghapus gambar lama dari folder jika ada
        if ($gambar_lama != 0 and $detail_gambar_lama != 0) {
            unlink("../../assets/img/game/$gambar_lama");
            unlink("../../assets/img/detail_game/$detail_gambar_lama");
        }

        // Memasukkan gambar ke folder
        move_uploaded_file($tmp_gambar, "../../assets/img/game/$nama_gambar");
        move_uploaded_file($tmp_detail_gambar, "../../assets/img/detail_game/$nama_detail_gambar");

        // query ketika menggunakan gambar baru
        $query = "UPDATE game SET nama_game = '$nama_game', nama_perusahaan = '$nama_perusahaan', gambar_game = '$nama_gambar', gambar_detail = '$nama_detail_gambar', id_kategori = $id_kategori WHERE id_game = $id_game";
    }

    // Mengedit data ke database
    $result = mysqli_query($koneksi, $query);
    header("location: game.php");
} else {
    header("location: game.php");
}