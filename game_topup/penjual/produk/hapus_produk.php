<?php
include_once "../../koneksi.php";

// Mengambil id produk dari URL
$id_produk = $_GET["id"];

// Menghapus data produk dari database
$query = "DELETE FROM produk WHERE id_produk = $id_produk";
$result = mysqli_query($koneksi, $query);
header("location: produk.php");
