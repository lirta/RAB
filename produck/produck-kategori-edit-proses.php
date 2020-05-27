<?php
include "../assets/coneksi/config.php";


$querii = "UPDATE kategori_produk SET nama_kategori='$_POST[kategori]' WHERE id_kategori_produk='$_POST[id]'";

mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:produck-kategori-view.php');
