<?php
include "../assets/coneksi/config.php";


mysqli_multi_query($koneksi, "DELETE FROM bahan WHERE id_bahan='$_GET[id]'");
mysqli_close($koneksi);
header('location:bahan-view.php');
