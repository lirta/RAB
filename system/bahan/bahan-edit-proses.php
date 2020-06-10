<?php
include "../assets/coneksi/config.php";


$querii = "UPDATE bahan SET id_bahan_kategori='$_POST[kategori]',
                                nama_bahan='$_POST[bahan]',
                                merek='$_POST[merek]',
                                kualitas='$_POST[kualitas]',
                                harga='$_POST[harga]'
                                WHERE id_bahan='$_POST[id]'";

mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:bahan-view.php');
