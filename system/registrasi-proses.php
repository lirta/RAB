<?php
include "assets/coneksi/config.php";

$acak = rand(000000, 999999);

$pas  = md5($_POST['pass']);
$status = "AKTIF";
$queri = "SELECT * FROM konsumen WHERE username='$_POST[user]'";
$hasil = mysqli_query($koneksi, $queri);
$K = mysqli_num_rows($hasil);
$kolom = mysqli_fetch_assoc($hasil);
if ($K > 0) {
    echo '<script language="javascript">
              alert ("Username Sudah Ada Yang Menggunakan");
              window.location="registrasi.php";
              </script>';
    exit();
} else {
    $us = $_POST['user'];
    $id = $us . $acak;
    $querii = "INSERT INTO konsumen ( 
                                    id_konsumen,
                                    nama_konsumen,
                                    alamat_konsumen,
                                    no_hp_konsumen,
                                    email_konsumen,
                                    username,
                                    password) 
                                    values 
                                    (
                                    '$id',
                                    '$_POST[nama]',
                                    '$_POST[alamat]',
                                    '$_POST[hp]',
                                    '$_POST[email]',
                                    '$_POST[user]',
                                    '$pas')";
}
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:login-konsumen.php');
