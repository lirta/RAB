<?php
include "../assets/coneksi/config.php";

$id = $_GET['id'];
$stat = $_GET['st'];
if ($stat == "AKTIF") {
    $status = "NON AKTIF";
    $querii = "UPDATE login SET status='$status' WHERE username='$id'";
    mysqli_query($koneksi, $querii);
    mysqli_close($koneksi);
    header('location:akses-view.php');
} else {
    $status = "AKTIF";
    $querii = "UPDATE login SET status='$status' WHERE username='$id'";
    mysqli_query($koneksi, $querii);
    mysqli_close($koneksi);
    header('location:akses-view.php');
}
