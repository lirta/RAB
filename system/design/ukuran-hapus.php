<?php
include "../assets/coneksi/config.php";

$qbahan = mysqli_query($koneksi, "SELECT * FROM detail_ukuran WHERE id_detail_ukuran='$_GET[id]' ");
$bahan = mysqli_fetch_assoc($qbahan);
$id = $bahan['id_orderan'];

$queri = "DELETE FROM detail_ukuran WHERE id_detail_ukuran='$_GET[id]';";
mysqli_multi_query($koneksi, $queri);
mysqli_close($koneksi);
header("location:order-detail.php?id=$id");
