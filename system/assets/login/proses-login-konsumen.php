<?php
include "../coneksi/config.php";
$username = $_POST['username'];
$pass     = md5($_POST['password']);
$sql = "SELECT * FROM konsumen WHERE username='$username' AND password='$pass'";
$result = mysqli_query($koneksi, $sql);
$ketemu = mysqli_num_rows($result);
$r = mysqli_fetch_assoc($result);
if ($ketemu > 0) {

    session_start();
    $_SESSION['id'] = $r['id_konsumen'];
    $_SESSION['username']        = $r['username'];
    $_SESSION['password']        = $r['password'];
    $_SESSION['nama']            = $r['nama_konsumen'];
    $_SESSION['akses']           = "KONSUMEN";
    if ($_SESSION['akses'] == "KONSUMEN") {
        header('location:../../index.php');
    }
} else {
    echo '<script language="javascript">
              alert ("Username dan Password Anda Salah");
              window.location="logout.php";
              </script>';
    exit();
}
