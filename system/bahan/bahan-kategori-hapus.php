<?php
include "../assets/coneksi/config.php";


mysqli_multi_query($koneksi, "DELETE FROM bahan_kategori WHERE id_bahan_kategori='$_GET[id]'");
mysqli_multi_query($koneksi, "DELETE FROM bahan WHERE id_bahan_kategori='$_GET[id]'");
mysqli_close($koneksi);
header('location:bahan-kategori-view.php');
