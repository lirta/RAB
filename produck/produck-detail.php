<?php include "../assets/coneksi/config.php";
if (!isset($_SESSION)) {
    session_start();
}
if (
    empty($_SESSION['username']) and
    empty($_SESSION['password'])
) {
    header('location:../login.php');
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

            <link href="../css/plugins/dataTables/datatables.min.css" rel="stylesheet">

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
                    <?php include 'nav.php'; ?>
                    <?php
                    $hasil = mysqli_query($koneksi, "SELECT * FROM produk inner join kategori_produk on produk.id_kategori_produk=kategori_produk.id_kategori_produk  WHERE id_produk='$_GET[id]' ");
                    $kolom = mysqli_fetch_assoc($hasil);
                    ?>
                    <div class="row wrapper border-bottom white-bg page-heading">
                        <div class="col-lg-10">
                            <h2>Produck <?php echo "$kolom[nama_produk]"; ?> <br><?php echo " Kategori $kolom[nama_kategori]"; ?> </h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="../index.php">Home</a>
                                </li>
                                <li class="active">
                                    <strong>Data Detail Produck</strong>
                                </li>
                            </ol>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3><?php echo "$kolom[nama_produk]"; ?></h3>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div>
                                            <?php echo "<img src='../assets/foto-produck/$kolom[gambar]' width='100%'>"; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3>Detail Ukuran</h3>
                                        <div class="hr-line-dashed"></div>
                                        <a href='detail-ukuran-add.php' class='btn btn-primary'>TAMBAH DATA</a>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>ukuran</th>
                                                        <th>Cm</th>
                                                        <th width="15%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $qukuran = mysqli_query($koneksi, "SELECT * FROM detail_ukuran   WHERE id_produk='$_GET[id]' ");
                                                    while ($ukuran = mysqli_fetch_assoc($qukuran)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo "$ukuran[ukuran]"; ?></td>
                                                            <td><?php echo "$ukuran[cm]"; ?></td>
                                                            <td>
                                                                <?php
                                                                echo "<a href='detail-ukuran-edit.php?id=$ukuran[id_detail_ukuran]'  class='btn btn-primary btn-sm'>EDIT</a>
                                                                    <a href='detail-ukuran-hapus.php?id=$ukuran[id_detail_ukuran]'  class='btn btn-danger btn-sm'>HAPUS</a> ";

                                                                ?></td>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3>Detail Bahan</h3>
                                        <div class="hr-line-dashed"></div>
                                        <a href='detail-bahan-add.php' class='btn btn-primary'>TAMBAH DATA</a>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Kategori Bahan</th>
                                                        <th>Nama Bahan</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th width="15%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $qdbahan = mysqli_query($koneksi, "SELECT * FROM detail_bahan   WHERE id_produk='$_GET[id]' ");
                                                    while ($dbahan = mysqli_fetch_assoc($qdbahan)) {
                                                        $qbahan = mysqli_query($koneksi, "SELECT * FROM bahan inner join bahan_kategori on bahan.id_bahan_kategori=bahan_kategori.id_bahan_kategori   WHERE id_bahan='$dbahan[id_bahan]' ");
                                                        while ($bahan = mysqli_fetch_assoc($qbahan)) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo "$bahan[bahan_kategori]"; ?></td>
                                                                <td><?php echo "$bahan[nama_bahan]"; ?></td>
                                                                <td><?php echo "$dbahan[jml]"; ?></td>
                                                                <td><?php echo "$dbahan[harga]"; ?></td>
                                                                <td>
                                                                    <?php
                                                                    echo "<a href='detail-bahan-edit.php?id=$dbahan[id_detail_bahan]'  class='btn btn-primary btn-sm'>EDIT</a>
                                                                    <a href='detail-bahan-hapus.php?id=$dbahan[id_detail_bahan]'  class='btn btn-danger btn-sm'>HAPUS</a> ";

                                                                    ?></td>
                                                                </td>
                                                            </tr>
                                                    <?php }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include 'footer.php'; ?>
                </div>
            </div>



            <!-- Mainly scripts -->
            <script src="../js/jquery-3.1.1.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
            <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

            <script src="../js/plugins/dataTables/datatables.min.js"></script>

            <!-- Custom and plugin javascript -->
            <script src="../js/inspinia.js"></script>
            <script src="../js/plugins/pace/pace.min.js"></script>

            <!-- Page-Level Scripts -->
            <script>
                $(document).ready(function() {
                    $('.dataTables-example').DataTable({
                        pageLength: 25,
                        responsive: true,
                        dom: '<"html5buttons"B>lTfgitp',
                        buttons: [{
                                extend: 'copy'
                            },
                            {
                                extend: 'csv'
                            },
                            {
                                extend: 'excel',
                                title: 'Data Kariawan'
                            },
                            {
                                extend: 'pdf',
                                title: 'Data Kariawan'
                            },

                            {
                                extend: 'print',
                                customize: function(win) {
                                    $(win.document.body).addClass('white-bg');
                                    $(win.document.body).css('font-size', '10px');

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ]

                    });

                });
            </script>

        </body>

        </html>
<?php
    } else {
        echo '<script language="javascript">
                        alert ("Anda Tida Punya Akses");
                        window.location="../assets/login/logout.php";
                        </script>';
        exit();
    }
}; ?>