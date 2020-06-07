<?php
include "../assets/coneksi/config.php";


$id = $_GET['id'];
$status = "DESIGN";


$querii = "UPDATE orderan SET status_order='$status' WHERE id_orderan='$id'";

mysqli_query($koneksi, $querii);


mysqli_close($koneksi);
header("location:order-selesai-view.php");
