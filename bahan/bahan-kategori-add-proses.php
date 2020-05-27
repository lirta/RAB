<?php
include "../assets/coneksi/config.php";


$querii = "INSERT INTO bahan_kategori ( bahan_kategori) 
                            values 
                            ('$_POST[kategori]')";

mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:bahan-kategori-view.php');
