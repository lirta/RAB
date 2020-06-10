<?php
include "../assets/coneksi/config.php";

$pas  = md5($_POST['pass']);
$status = "AKTIF";
$queri = "SELECT * FROM login WHERE username='$_POST[user]'";
$hasil = mysqli_query($koneksi, $queri);
$K = mysqli_num_rows($hasil);
$kolom = mysqli_fetch_assoc($hasil);
if ($K > 0) {
    echo '<script language="javascript">
              alert ("Username Sudah Ada Yang Menggunakan");
              window.location="akses-add.php";
              </script>';
    exit();
} else {
    $querii = "INSERT INTO login ( 
                                    username,
                                    password,
                                    id_kariawan,
                                    akses,
                                    status) 
                                    values 
                                    (
                                    '$_POST[user]',
                                    '$pas',
                                    '$_POST[id]',
                                    '$_POST[akses]',
                                    '$status')";
}
mysqli_query($koneksi, $querii);
mysqli_close($koneksi);
header('location:akses-view.php');
