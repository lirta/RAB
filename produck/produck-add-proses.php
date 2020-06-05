<?php
include "../assets/coneksi/config.php";

$acak = rand(00000000, 99999999);
$id = "PRODUK" . $acak;
$namafoto = $_FILES['file']['name'];
$nama = "produck" . $acak . $namafoto;
$folderawal = $_FILES['file']['tmp_name'];
$foldertujuan = "../assets/foto-produck/";
move_uploaded_file($folderawal, $foldertujuan . $nama);
$querii = "INSERT INTO produk ( id_produk,
                                    id_kategori_produk,
                                    nama_produk,
                                    gambar) 
                                    values 
                                    (
                                    '$id',
                                    '$_POST[kategori]',
                                    '$_POST[nama]',
                                    '$nama')";
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:produck-view.php');
