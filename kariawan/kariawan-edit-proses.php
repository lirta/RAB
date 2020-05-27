<?php
include "../assets/coneksi/config.php";

$acak = rand(00000000, 99999999);
$namafoto = $_FILES['file']['name'];
$nama = "krw" . $acak . $namafoto;
$folderawal = $_FILES['file']['tmp_name'];
$foldertujuan = "../assets/foto-kariawan/";
if (!empty($folderawal)) {
    move_uploaded_file($folderawal, $foldertujuan . $nama);
    $querii = "UPDATE kariawan set nama_kariawan    ='$_POST[nama]',
                                        alamat      ='$_POST[alamat]',
                                        no_hp       ='$_POST[hp]',
                                        foto        ='$nama'
                                        where
                                        id_kariawan ='$_POST[id]'";
    mysqli_query($koneksi, $querii);
    mysqli_close($koneksi);
    header('location:kariawan_view.php');
} else {
    move_uploaded_file($folderawal, $foldertujuan . $nama);
    $querii = "UPDATE kariawan set nama_kariawan    ='$_POST[nama]',
                                        alamat      ='$_POST[alamat]',
                                        no_hp       ='$_POST[hp]'
                                        where
                                        id_kariawan ='$_POST[id]'";
    mysqli_query($koneksi, $querii);
    mysqli_close($koneksi);
    header('location:kariawan_view.php');
}
