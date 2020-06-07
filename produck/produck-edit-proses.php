<?php
include "../assets/coneksi/config.php";

$acak = rand(00000000, 99999999);
$namafoto = $_FILES['file']['name'];
$nama = "produck" . $acak . $namafoto;
$folderawal = $_FILES['file']['tmp_name'];
$foldertujuan = "../assets/foto-produck/";
if (!empty($folderawal)) {

    move_uploaded_file($folderawal, $foldertujuan . $nama);
    $querii = "UPDATE produk SET id_kategori_produk='$_POST[kategori]',
                                        nama_produk='$_POST[nama]',
                                        harga='$_POST[harga]',
                                        keterangan='$_POST[deskripsi]',
                                        gambar='$nama' 
                                        WHERE
                                        id_produk='$_POST[id]'";
    mysqli_query($koneksi, $querii);
    mysqli_close($koneksi);
    header('location:produck-view.php');
} else {
    $querii = "UPDATE produk SET id_kategori_produk='$_POST[kategori]',
                                    nama_produk='$_POST[nama]',
                                        harga='$_POST[harga]',
                                        keterangan='$_POST[deskripsi]'
                                     WHERE
                                    id_produk='$_POST[id]'";
    mysqli_query($koneksi, $querii);
    mysqli_close($koneksi);
    header('location:produck-view.php');
}
