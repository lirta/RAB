<?php
include "../assets/coneksi/config.php";

$acak = rand(00000000, 99999999);
$namafoto = $_FILES['file']['name'];
$nama = "krw" . $acak . $namafoto;
$folderawal = $_FILES['file']['tmp_name'];
$foldertujuan = "../assets/foto-kariawan/";
move_uploaded_file($folderawal, $foldertujuan . $nama);
$querii = "INSERT INTO kariawan ( nama_kariawan,
                                    alamat,
                                    no_hp,
                                    foto) 
                                    values 
                                    (
                                    '$_POST[nama]',
                                    '$_POST[alamat]',
                                    '$_POST[hp]',
                                    '$nama')";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:kariawan_view.php');
