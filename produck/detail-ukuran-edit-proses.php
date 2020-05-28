<?php
include "../assets/coneksi/config.php";

$idd = $_POST['idp'];
$querii = "UPDATE detail_ukuran SET 
                                     ukuran='$_POST[ukuran]', 
                                     cm='$_POST[cm]' 
                                     WHERE
                                     id_detail_ukuran='$_POST[idu]'";

mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header("location:produck-detail.php?id=$idd");
