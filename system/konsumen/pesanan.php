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
    if ($_SESSION['akses'] == "KONSUMEN") { ?>
        <!DOCTYPE html>
        <html>

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>CV. KAYANA CITRA GEMILANG</title>

            <link href="../css/bootstrap.min.css" rel="stylesheet">
            <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

            <!-- FooTable -->
            <link href="../css/plugins/footable/footable.core.css" rel="stylesheet">

            <link href="../css/animate.css" rel="stylesheet">
            <link href="../css/style.css" rel="stylesheet">



        </head>

        <body>

            <div id="wrapper">

                <nav class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <?php include 'menu.php'; ?>
                    </div>
                </nav>

                <div id="page-wrapper" class="gray-bg">
                    <div class="row border-bottom">
                        <?php include 'nav.php'; ?>
                    </div>
                    <div class="row wrapper border-bottom white-bg page-heading">
                        <div class="col-lg-10">
                            <h2>E-commerce product list</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a>E-commerce</a>
                                </li>
                                <li class="active">
                                    <button><strong>Product list</strong></button>
                                </li>
                            </ol>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>

                    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox">
                                    <div class="ibox-title">
                                        <h3>pesanan</h3>
                                    </div>
                                    <div class="ibox-content">

                                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                            <thead>
                                                <tr>

                                                    <th data-toggle="true">Product Name</th>
                                                    <th data-hide="all">Deskripsi/Produck</th>
                                                    <th data-hide="phone">Jumlah items</th>
                                                    <th data-hide="phone">Total harga</th>
                                                    <th data-hide="phone">Kategori</th>
                                                    <th data-hide="phone">Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php $hasil = mysqli_query($koneksi, "SELECT * FROM orderan where id_konsumen='$_SESSION[id]' ");
                                                    $ketemu = mysqli_num_rows($hasil);
                                                    while ($kolom = mysqli_fetch_assoc($hasil)) { ?>
                                                        <td>
                                                            <?php echo "$kolom[tanggal]"; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($kolom['kategori'] == "PRODUCK") {
                                                                $t = 0;
                                                                $h = 0;
                                                                $qkp = mysqli_query($koneksi, "SELECT * FROM detail_orderan  WHERE id_orderan='$kolom[id_orderan]' ");
                                                                while ($kp = mysqli_fetch_assoc($qkp)) {
                                                                    $qproduk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$kp[id_produk]'");
                                                                    $pro = mysqli_fetch_assoc($qproduk);
                                                                    $t = $t + $kp['jumlah'];
                                                                    echo "
                                                                            <ul>
                                                                            <li> $pro[nama_produk]  <br> Jumlah = $kp[jumlah] <br> Harga/item = $pro[harga]</li>
                                                                            </ul>
                                                                            ";
                                                                    $h = $h + $kp['harga'];
                                                                }
                                                            } else {
                                                                $qks = mysqli_query($koneksi, "SELECT * FROM detail_orderan_kastem  WHERE id_orderan='$kolom[id_orderan]' ");
                                                                $ks = mysqli_fetch_assoc($qks);
                                                                echo "
                                                                            <ul>
                                                                            <li> $ks[keterangan_kastem] </li>
                                                                            </ul>
                                                                            ";
                                                            }
                                                            ?>


                                                        </td>
                                                        <?php if ($kolom['kategori'] == "PRODUCK") { ?>

                                                            <td><?php echo "$t"; ?></td>
                                                            <td><?php echo "Rp.  " . number_format($h, 2, ".", ","); ?></td>
                                                        <?php   } else { ?>
                                                            <td><?php echo "$ks[jumlah_kastem]"; ?></td>
                                                            <td><?php echo "Rp.  "  ?></td>
                                                        <?php  }  ?>
                                                        <td><?php echo "$kolom[kategori]"; ?></td>
                                                        <td><?php echo "$kolom[status_order]"; ?></td>
                                                </tr>
                                            <?php } ?>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">
                                                        <ul class="pagination pull-right"></ul>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="footer">
                        <div class="pull-right">
                            10GB of <strong>250GB</strong> Free.
                        </div>
                        <div>
                            <strong>Copyright</strong> Example Company &copy; 2014-2017
                        </div>
                    </div>

                </div>
            </div>



            <!-- Mainly scripts -->
            <script src="../js/jquery-3.1.1.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
            <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

            <!-- Custom and plugin javascript -->
            <script src="../js/inspinia.js"></script>
            <script src="../js/plugins/pace/pace.min.js"></script>

            <!-- FooTable -->
            <script src="../js/plugins/footable/footable.all.min.js"></script>

            <!-- Page-Level Scripts -->
            <script>
                $(document).ready(function() {

                    $('.footable').footable();

                });
            </script>

        </body>

        </html>


<?php  } else {
        echo '<script language="javascript">
                    alert ("Anda Tidak Punya Akses");
                    window.location="../assets/login/logout.php";
                    </script>';
        exit();
    }
}
