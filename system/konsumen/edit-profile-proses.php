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

        $hasil = mysqli_query($koneksi, "SELECT * FROM konsumen where username='$_POST[user]' ");
        $user = mysqli_fetch_assoc($hasil);
        if ($user['username'] == $_POST['user']) {
            if ($user['id_konsumen'] == $_SESSION['id']) {
                if (!empty($_POST['pass'])) {
                    $pas  = md5($_POST['pass']);
                    $querii = "UPDATE konsumen SET nama_konsumen ='$_POST[nama]',
                                                alamat_konsumen='$_POST[alamat]',
                                                no_hp_konsumen='$_POST[hp]',
                                                email_konsumen='$_POST[email]',
                                                username='$_POST[user]',
                                                password='$pas'
                                                WHERE 
                                                id_konsumen='$_SESSION[id]'";
                    mysqli_query($koneksi, $querii);
                    mysqli_close($koneksi);
                    header('location:index.php');
                } else {
                    $querii = "UPDATE konsumen SET nama_konsumen ='$_POST[nama]',
                                                alamat_konsumen='$_POST[alamat]',
                                                no_hp_konsumen='$_POST[hp]',
                                                email_konsumen='$_POST[email]',
                                                username='$_POST[user]'
                                                WHERE 
                                                id_konsumen='$_SESSION[id]'";
                    mysqli_query($koneksi, $querii);
                    mysqli_close($koneksi);
                    header('location:index.php');
                }
            } else {
                echo '<script language="javascript">
                    alert ("Username Sudah Digunakan");
                    window.location="konsumen-edit.php";
                    </script>';
                exit();
            }
        } else {
            if (!empty($_POST['pass'])) {
                $pas  = md5($_POST['pass']);
                $querii = "UPDATE konsumen SET nama_konsumen ='$_POST[nama]',
                                            alamat_konsumen='$_POST[alamat]',
                                            no_hp_konsumen='$_POST[hp]',
                                            email_konsumen='$_POST[email]',
                                            username='$_POST[user]',
                                            password='$pas'
                                            WHERE 
                                            id_konsumen='$_SESSION[id]'";
                mysqli_query($koneksi, $querii);
                mysqli_close($koneksi);
                header('location:index.php');
            } else {
                $querii = "UPDATE konsumen SET nama_konsumen ='$_POST[nama]',
                                            alamat_konsumen='$_POST[alamat]',
                                            no_hp_konsumen='$_POST[hp]',
                                            email_konsumen='$_POST[email]',
                                            username='$_POST[user]'
                                            WHERE 
                                            id_konsumen='$_SESSION[id]'";
                mysqli_query($koneksi, $querii);
                mysqli_close($koneksi);
                header('location:index.php');
            }
        }
    } else {
        echo '<script language="javascript">
                    alert ("Anda Tidak Punya Akses");
                    window.location="../assets/login/logout.php";
                    </script>';
        exit();
    }
}
