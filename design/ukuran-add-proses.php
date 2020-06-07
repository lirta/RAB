<?php
include "../assets/coneksi/config.php";


$uk = $_POST['ukuran'];
$cm = $_POST['cm'];
$jml = $_POST['jml'];
$idd = $_POST['id'];

$jb = count($jml);

for ($i = 0; $i < $jb; $i++) {

    $querii = "INSERT INTO detail_ukuran ( id_orderan,
                                            ukuran,
                                            cm) 
                            values 
                            ('$idd',
                            '$uk[$i]',
                            '$cm[$i]')";

    mysqli_query($koneksi, $querii);
}

mysqli_close($koneksi);
header("location:order-view.php");
