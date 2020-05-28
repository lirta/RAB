<?php
include "../assets/coneksi/config.php";


$id_bahan = $_POST['bahan'];
$idd = $_POST['idp'];

$queri = mysqli_query($koneksi, "SELECT * FROM bahan WHERE id_bahan='$id_bahan' ");
$edit = mysqli_fetch_assoc($queri);

$hrg = $_POST['jml'] * $edit['harga'];

$querii = "UPDATE detail_bahan SET id_bahan='$id_bahan',
                                    jml='$_POST[jml]', 
                                    harga='$hrg' WHERE id_detail_bahan='$_POST[idb]'";

mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header("location:produck-detail.php?id=$idd");
