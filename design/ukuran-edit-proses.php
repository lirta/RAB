<?php
include "../assets/coneksi/config.php";


$uk = $_POST['ukuran'];
$cm = $_POST['cm'];
$id = $_POST['ido'];
$idd = $_POST['idu'];


$querii = "UPDATE detail_ukuran SET ukuran='$uk',
                                    cm='$cm'
                                    WHERE
                                    id_detail_ukuran='$idd'";

mysqli_query($koneksi, $querii);


mysqli_close($koneksi);
header("location:order-detail.php?id=$id");
