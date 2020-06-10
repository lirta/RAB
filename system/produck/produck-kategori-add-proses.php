<?php
include "../assets/coneksi/config.php";


$querii = "INSERT INTO kategori_produk ( nama_kategori) 
                            values 
                            ('$_POST[kategori]')";

mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:produck-kategori-view.php');
