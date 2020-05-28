<?php
include "../assets/coneksi/config.php";

$idd = $_POST['id'];
$querii = "INSERT INTO detail_ukuran ( id_produk, ukuran, cm) 
                            values 
                            ('$idd','$_POST[ukuran]','$_POST[cm]')";

mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header("location:produck-detail.php?id=$idd");
