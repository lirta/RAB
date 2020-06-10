<?php
include "../assets/coneksi/config.php";
if (!isset($_SESSION)) {
    session_start();
}
if (
    empty($_SESSION['username']) and
    empty($_SESSION['password'])
) {
    header('location:../login.php');
} else {
    if ($_SESSION['akses'] == "KONSUMEN") {

        $kon = $_SESSION['id'];
        $pro = $_GET['id'];
        $querii = "INSERT INTO cart ( id_konsumen,
                                    id_produk) 
                                    values 
                                    ('$kon',
                                    '$pro')";
        mysqli_query($koneksi, $querii);
        mysqli_close($koneksi);
        header('location:katalog.php');
    } else {
        echo '<script language="javascript">
                    alert ("Anda Tidak Punya Akses");
                    window.location="../assets/login/logout.php";
                    </script>';
        exit();
    }
}
