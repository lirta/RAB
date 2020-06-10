<?php
include "../assets/coneksi/config.php";

$date = date(' d/m/Y');
$acak = rand(0000000, 9999999);
$s = "ORDER";
$k = "PRODUCK";

$konsumen = $_POST['id'];
$jp    = $_POST['jlh'];
$produk    = $_POST['pro'];
$jumlah = $_POST['qrt'];
$cart = $_POST['id'];
$h = $_POST['harga'];

$id_order = "ORDERPRODUK" . $acak;

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

for ($i = 0; $i < $jp; $i++) {
    $p = $produk[$i];
    $j = $jumlah[$i];
    $idc = $cart[$i];
    $hh = $jumlah[$i] * $h[$i];
    $querii = "INSERT INTO detail_orderan (id_orderan,id_produk,jumlah,harga)values('$id_order','$p','$j','$hh')";
    mysqli_query($koneksi, $querii);
    echo "$konsumen,$p,$j,$hh <br>";
}
$queri = "DELETE FROM cart WHERE id_konsumen='$konsumen'";
mysqli_multi_query($koneksi, $queri);
mysqli_close($koneksi);
header('location:pesanan.php');
