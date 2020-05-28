<?php
include "../assets/coneksi/config.php";


$id_bahan = $_POST['bahan'];
$idd = $_POST['id'];

$queri = mysqli_query($koneksi, "SELECT * FROM bahan WHERE id_bahan='$id_bahan' ");
$edit = mysqli_fetch_assoc($queri);

$hrg = $_POST['jml'] * $edit['harga'];

$querii = "INSERT INTO detail_bahan ( id_produk, id_bahan, jml, harga) 
                            values 
                            ('$idd','$id_bahan','$_POST[jml]','$hrg')";

mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header("location:produck-detail.php?id=$idd");
