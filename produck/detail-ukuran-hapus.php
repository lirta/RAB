<?php
include "../assets/coneksi/config.php";

$idd = $_GET['id'];
$id_b = $_GET['idb'];
mysqli_multi_query($koneksi, "DELETE FROM detail_ukuran WHERE id_detail_ukuran='$_GET[id]'");
mysqli_close($koneksi);
header("location:produck-detail.php?id=$id_b");
