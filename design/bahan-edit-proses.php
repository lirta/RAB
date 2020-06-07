<?php
include "../assets/coneksi/config.php";


$bahan = $_POST['bahan'];
$jumlah = $_POST['jml'];
$idd = $_POST['id'];


$idb = $bahan;

$queri = mysqli_query($koneksi, "SELECT * FROM bahan WHERE id_bahan='$idb' ");
$edit = mysqli_fetch_assoc($queri);

$hrg = $jumlah * $edit['harga'];

// echo "$idb=$jumlah=$hrg=$_POST[detail]";

$querii = "UPDATE detail_bahan SET id_bahan='$idb',
                                    jml='$jumlah',
                                    harga='$hrg'
                                    WHERE 
                                    id_detail_bahan='$_POST[detail]'";

mysqli_query($koneksi, $querii);


mysqli_close($koneksi);
header("location:order-detail.php?id=$idd");
