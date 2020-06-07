<?php
include "../assets/coneksi/config.php";


$bahan = $_POST['bahan'];
$jumlah = $_POST['jml'];
$idd = $_POST['id'];

$jb = count($bahan);

for ($i = 0; $i < $jb; $i++) {
    $idb = $bahan[$i];

    $queri = mysqli_query($koneksi, "SELECT * FROM bahan WHERE id_bahan='$idb' ");
    $edit = mysqli_fetch_assoc($queri);

    $hrg = $jumlah[$i] * $edit['harga'];

    $querii = "INSERT INTO detail_bahan ( id_orderan,
                                            id_bahan,
                                            jml,
                                            harga) 
                            values 
                            ('$idd',
                            '$idb',
                            '$jumlah[$i]',
                            '$hrg')";

    mysqli_query($koneksi, $querii);
}

mysqli_close($koneksi);
header("location:order-view.php");
