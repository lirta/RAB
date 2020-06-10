<?php include "assets/coneksi/config.php";
if (!isset($_SESSION)) {
    session_start();
}
if (
    empty($_SESSION['username']) and
    empty($_SESSION['password'])
) {
    header('location:login.php');
} else {
    if ($_SESSION['akses'] == "ADMIN") {
        header('location:kariawan/index.php');
    } elseif ($_SESSION['akses'] == "DESIGN") {
        header('location:design/index.php');
    } else {
        echo '<script language="javascript">
                        alert ("Anda Tida Punya Akses");
                        window.location="assets/login/logout.php";
                        </script>';
        exit();
    }
};
