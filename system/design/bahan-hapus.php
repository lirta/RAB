<?php
include "../assets/coneksi/config.php";

$qbahan = mysqli_query($koneksi, "SELECT * FROM detail_bahan WHERE id_detail_bahan='$_GET[id]' ");
$bahan = mysqli_fetch_assoc($qbahan);
$id = $bahan['id_orderan'];

$queri = "DELETE FROM detail_bahan WHERE id_detail_bahan='$_GET[id]';";
mysqli_multi_query($koneksi, $queri);
mysqli_close($koneksi);
header("location:order-detail.php?id=$id");
