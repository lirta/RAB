<?php
include "../assets/coneksi/config.php";


$querii = "INSERT INTO bahan ( id_bahan_kategori,
                                nama_bahan,
                                merek,
                                kualitas,
                                harga) 
                            values 
                            ('$_POST[kategori]',
                            '$_POST[bahan]',
                            '$_POST[merek]',
                            '$_POST[kualitas]',
                            '$_POST[harga]')";

mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:bahan-view.php');
