<?php
include "../assets/coneksi/config.php";

$queri = "DELETE FROM cart WHERE id='$_GET[id]';";
mysqli_multi_query($koneksi, $queri);
mysqli_close($koneksi);
header('location:cart-view.php');
