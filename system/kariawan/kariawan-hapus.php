<?php
include "../assets/coneksi/config.php";


mysqli_multi_query($koneksi, "DELETE FROM kariawan WHERE id_kariawan='$_GET[id]'");
mysqli_multi_query($koneksi, "DELETE FROM login WHERE id_kariawan='$_GET[id]'");
mysqli_close($koneksi);
header('location:akses-view.php');
