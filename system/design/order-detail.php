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
    if ($_SESSION['akses'] == "DESIGN") {
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

                    <div class="row wrapper border-bottom white-bg page-heading">
                        <div class="col-lg-10">
                            <h2>Detail Orderan Kastem </h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="active">
                                    <strong>Data Orderan Kastem</strong>
                                </li>
                            </ol>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3>Data Orderan</h3>

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
                                            <?php
                                            $hasil = mysqli_query($koneksi, "SELECT * FROM orderan inner join konsumen on orderan.id_konsumen=konsumen.id_konsumen  WHERE id_orderan='$_GET[id]' ");
                                            $kolom = mysqli_fetch_assoc($hasil);
                                            ?>
                                            <table class="table ">

                                                <tr>
                                                    <th>Nama</th>
                                                    <th>:</th>
                                                    <td><?php echo "$kolom[nama_konsumen]"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <th>:</th>
                                                    <td><?php echo "$kolom[alamat_konsumen]"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>NO Telpon</th>
                                                    <th>:</th>
                                                    <td><?php echo "$kolom[no_hp_konsumen]"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <th>:</th>
                                                    <td><?php echo "$kolom[email_konsumen]"; ?></td>
                                                </tr>
                                                <?php
                                                $qdetail = mysqli_query($koneksi, "SELECT * FROM detail_orderan_kastem  WHERE id_orderan='$_GET[id]' ");
                                                $detail = mysqli_fetch_assoc($qdetail);
                                                ?>
                                                <tr>
                                                    <th>Tanggal Order</th>
                                                    <th>:</th>
                                                    <td><?php echo "$kolom[tanggal]"; ?></td>
                                                </tr>

                                                <tr>
                                                    <th>Nama Produck</th>
                                                    <th>:</th>
                                                    <td><?php echo "$detail[nama_kastem]"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Kategori</th>
                                                    <th>:</th>
                                                    <td><?php echo "$detail[kategori_kastem]"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Jumlah</th>
                                                    <th>:</th>
                                                    <td><?php echo "$detail[jumlah_kastem]"; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Keterangan</th>
                                                    <th>:</th>
                                                    <td><?php echo "$detail[keterangan_kastem]"; ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3>Referensi</h3>
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

                                            <?php echo "<img src='../assets/foto-referensi-produck/$detail[referensi]' width='100%'>"; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3>Detail Ukuran</h3>
                                        <?php echo "<a href='ukuran-add.php?id=$kolom[id_orderan]'  class='btn btn-primary btn-sm'><i class='fa fa-plus'></i></a>"; ?>
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
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>Ukuran</th>
                                                        <th>Cm</th>
                                                        <th class="text-right" data-sort-ignore="true">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $qukuran = mysqli_query($koneksi, "SELECT * FROM detail_ukuran  WHERE id_orderan='$_GET[id]' ");
                                                    while ($ukuran = mysqli_fetch_assoc($qukuran)) {
                                                        echo "
                                                        <tr>
                                                        <td>$ukuran[ukuran]</td>
                                                        <td>$ukuran[cm]</td>
                                                        <td class='text-right'>
                                                                    <div class='btn-group'>
                                                                        
                                                                        <a href='ukuran-edit.php?id=$ukuran[id_detail_ukuran]'  class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></a>
                                                                        <a href='ukuran-hapus.php?id=$ukuran[id_detail_ukuran]'  class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a>
                                                                        
                                                                    </div>
                                                                </td>
                                                        </tr>";
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h3>Detail Bahan</h3>
                                        <?php echo "<a href='bahan-add.php?id=$kolom[id_orderan]'  class='btn btn-primary btn-sm'><i class='fa fa-plus'></i></a>"; ?>
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
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>Bahan</th>
                                                        <th>Kategori</th>
                                                        <th>Merek</th>
                                                        <th>Kualitas</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th class="text-right" data-sort-ignore="true">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $qbahan = mysqli_query($koneksi, "SELECT * FROM detail_bahan WHERE id_orderan='$_GET[id]' ");
                                                    while ($bahan = mysqli_fetch_assoc($qbahan)) {
                                                        $dbahan = mysqli_query($koneksi, "SELECT * FROM bahan inner join bahan_kategori on bahan.id_bahan_kategori=bahan_kategori.id_bahan_kategori WHERE id_bahan='$bahan[id_bahan]' ");
                                                        $detail = mysqli_fetch_assoc($dbahan); ?>

                                                        <tr>
                                                            <td><?php echo "$detail[nama_bahan]" ?></td>
                                                            <td><?php echo "$detail[bahan_kategori]" ?></td>
                                                            <td><?php echo "$detail[merek]" ?></td>
                                                            <td><?php echo "$detail[kualitas]" ?></td>
                                                            <td><?php echo "$bahan[jml]" ?></td>
                                                            <td><?php echo "Rp.  " . number_format($bahan['harga'], 0, ".", ","); ?></td>
                                                            <td class='text-right'>
                                                                <div class='btn-group'>
                                                                    <?php echo "
                                                                        <a href='bahan-edit.php?id=$bahan[id_detail_bahan]'  class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i></a>
                                                                        <a href='bahan-hapus.php?id=$bahan[id_detail_bahan]'  class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></a>";
                                                                    ?>

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php  } ?>
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
                        window.location="../index.php";
                        </script>';
        exit();
    }
}; ?>