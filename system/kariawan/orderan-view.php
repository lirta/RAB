<?php include "../assets/coneksi/config.php";
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
?>
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
                            <h2>List Orderan</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="active">
                                    <strong>list</strong>
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
                                        <h3>Orderan</h3>
                                    </div>
                                    <div class="ibox-content">

                                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                            <thead>
                                                <tr>

                                                    <th data-toggle="true">Tanggal Order</th>
                                                    <th data-hide="all">Deskripsi</th>
                                                    <th data-hide="phone">Konsumen</th>
                                                    <th data-hide="phone">Jumlah items</th>
                                                    <th data-hide="phone">Kategori</th>
                                                    <th data-hide="phone">Status</th>
                                                    <th class="text-right" data-sort-ignore="true">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $hasil = mysqli_query($koneksi, "SELECT * FROM orderan inner join konsumen on orderan.id_konsumen=konsumen.id_konsumen ");
                                                while ($kolom = mysqli_fetch_assoc($hasil)) {
                                                    if ($kolom['status_order'] == "ORDER") {
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo "$kolom[tanggal]"; ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($kolom['kategori'] == "PRODUCK") {
                                                                    $qkp = mysqli_query($koneksi, "SELECT * FROM detail_orderan INNER JOIN produk  on detail_orderan.id_produk=produk.id_produk inner join kategori_produk on produk.id_kategori_produk=kategori_produk.id_kategori_produk  WHERE id_orderan='$kolom[id_orderan]' ");
                                                                    $j = 0;
                                                                    while ($kp = mysqli_fetch_assoc($qkp)) {
                                                                        $j = $j + $kp['jumlah'];
                                                                        echo " 
                                                                        
                                                                            <ul>
                                                                                <li>$kp[nama_produk]</li>
                                                                                <li>Kategori Produck = $kp[nama_kategori]</li>
                                                                                <li>Jumlah = $kp[jumlah]</li>
                                                                            </ul> <hr>
                                                                        
                                                                        ";
                                                                    }
                                                                } elseif ($kolom['kategori'] == "KASTEM") {
                                                                    $qks = mysqli_query($koneksi, "SELECT * FROM detail_orderan_kastem  WHERE id_orderan='$kolom[id_orderan]' ");
                                                                    $ks = mysqli_fetch_assoc($qks);
                                                                    echo " $ks[keterangan_kastem]
                                                                        
                                                                        ";
                                                                } ?>
                                                            </td>
                                                            <td><?php echo "$kolom[nama_konsumen]"; ?></td>
                                                            <td><?php if ($kolom['kategori'] == "PRODUCK") {
                                                                    echo "$j";
                                                                } elseif ($kolom['kategori'] == "KASTEM") {
                                                                    echo "$ks[jumlah_kastem]";
                                                                } ?></td>
                                                            <td><?php echo "$kolom[kategori]"; ?></td>
                                                            <td><?php echo "$kolom[status_order]"; ?></td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>


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

<?php
    } else {
        echo '<script language="javascript">
                        alert ("Anda Tida Punya Akses");
                        window.location="../index.php";
                        </script>';
        exit();
    }
}; ?>