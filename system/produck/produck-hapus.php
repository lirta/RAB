<?php
include "../assets/coneksi/config.php";

$idd = $_GET['id'];
$id_b = $_GET['idb'];
mysqli_multi_query($koneksi, "DELETE FROM produk WHERE id_produk='$_GET[id]'");
mysqli_close($koneksi);
header("location:produck-view.php");
