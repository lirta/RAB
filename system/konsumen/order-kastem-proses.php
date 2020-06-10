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
        $date = date(' d/m/Y');
        $acak = rand(00000000, 99999999);
        $id = "PRODUK" . $acak;

        $s = "ORDER";
        $k = "KASTEM";

        $konsumen = $_SESSION['id'];

        $id_order = "ORDERKASTEM" . $acak;

        mysqli_query($koneksi, "INSERT INTO orderan (id_orderan,
                                            id_konsumen,
                                            tanggal,
                                            kategori,
                                            status_order)
                                            values
                                            ('$id_order',
                                            '$konsumen',
                                            '$date',
                                            '$k',
                                            '$s')");



        $namafoto = $_FILES['file']['name'];
        $nama = "kastem" . $namafoto;
        $folderawal = $_FILES['file']['tmp_name'];
        $foldertujuan = "../assets/foto-referensi-produck/";
        move_uploaded_file($folderawal, $foldertujuan . $nama);
        $querii = "INSERT INTO detail_orderan_kastem ( 
                                                id_orderan,
                                                nama_kastem,
                                                kategori_kastem,
                                                jumlah_kastem,
                                                keterangan_kastem,
                                                referensi) 
                                                values 
                                                (
                                                '$id_order',
                                                '$_POST[nama]',
                                                '$_POST[kategori]',
                                                '$_POST[jumlah]',
                                                '$_POST[deskripsi]',
                                                '$nama')";
        mysqli_query($koneksi, $querii);
        mysqli_close($koneksi);
        header('location:pesanan.php');
    } else {
        echo '<script language="javascript">
                    alert ("Anda Tidak Punya Akses");
                    window.location="../assets/login/logout.php";
                    </script>';
        exit();
    }
}
