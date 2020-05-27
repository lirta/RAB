<?php
include "../assets/coneksi/config.php";

$queri = "DELETE FROM login WHERE username='$_GET[id]';";
mysqli_multi_query($koneksi, $queri);
mysqli_close($koneksi);
header('location:akses-view.php');
