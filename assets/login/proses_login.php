<?php
include "../coneksi/config.php";
$username = $_POST['username'];
$pass     = md5($_POST['password']);
$sql = "SELECT * FROM login WHERE username='$username' AND password='$pass'";
$result = mysqli_query($koneksi, $sql);
$ketemu = mysqli_num_rows($result);
$r = mysqli_fetch_assoc($result);
if ($ketemu > 0) {
  if ($r['status'] == "AKTIF") {
    $id = $r['id_kariawan'];
    $query = mysqli_query($koneksi, "SELECT * FROM kariawan WHERE id_kariawan='$id'");
    $krwn = mysqli_fetch_assoc($query);
    session_start();
    $_SESSION['username']        = $r['username'];
    $_SESSION['password']        = $r['password'];
    $_SESSION['nama']            = $krwn['nama_kariawan'];
    $_SESSION['akses']           = $r['akses'];
    $_SESSION['foto']            = $krwn['foto'];
    if ($_SESSION['akses'] == "ADMIN") {
      header('location:../../index.php');
    }
  } else {
    echo '<script language="javascript">
              alert ("Mohan Maaf akses anda ditolak");
              window.location="logout.php";
              </script>';
  }
} else {
  echo '<script language="javascript">
              alert ("Username dan Password Anda Salah");
              window.location="logout.php";
              </script>';
  exit();
}
