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
                    <div class="row wrapper border-bottom white-bg page-heading">
                        <div class="col-lg-10">
                            <h2>Data Tables</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="../kariawan/index.php">Home</a>
                                </li>
                                <li class="active">
                                    <strong>Data Bahan</strong>
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
                                        <a href='bahan-add.php' class='btn btn-primary'>TAMBAH DATA</a>
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
                                                        <th>Bahan</th>
                                                        <th>Kategori Bahan</th>
                                                        <th>Merek</th>
                                                        <th>Kualitas</th>
                                                        <th>Harga Bahan</th>
                                                        <th width="10%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $hasil = mysqli_query($koneksi, "SELECT * FROM bahan inner join bahan_kategori on bahan.id_bahan_kategori=bahan_kategori.id_bahan_kategori    ");
                                                    while ($kolom = mysqli_fetch_assoc($hasil)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo "$kolom[nama_bahan]"; ?></td>
                                                            <td><?php echo "$kolom[bahan_kategori]"; ?></td>
                                                            <td><?php echo "$kolom[merek]"; ?></td>
                                                            <td><?php echo "$kolom[kualitas]"; ?></td>
                                                            <td><?php echo "$kolom[harga]"; ?></td>
                                                            <td>
                                                                <?php
                                                                echo "<a href='bahan-edit.php?id=$kolom[id_bahan]'  class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                                                                    <a href='bahan-hapus.php?id=$kolom[id_bahan]'  class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a> ";

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