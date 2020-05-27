<?php
include "../assets/coneksi/config.php";


$querii = "UPDATE bahan_kategori SET bahan_kategori= '$_POST[kategori]' WHERE id_bahan_kategori='$_POST[id]' ";

mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:bahan-kategori-view.php');
