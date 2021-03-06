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
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="active">
                                    <strong>Data Hak Akses</strong>
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
                                        <a href='akses-add.php' class='btn btn-primary'>TAMBAH DATA</a>
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
                                                        <th>Nama Kariawan</th>
                                                        <th>Username</th>
                                                        <th>Akses</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $hasil = mysqli_query($koneksi, "SELECT * FROM login inner join kariawan on login.id_kariawan=kariawan.id_kariawan  ");
                                                    while ($kolom = mysqli_fetch_assoc($hasil)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo "$kolom[nama_kariawan]"; ?></td>
                                                            <td><?php echo "$kolom[username]"; ?></td>
                                                            <td><?php echo "$kolom[akses]"; ?></td>
                                                            <td><?php echo "$kolom[status]"; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($kolom['status'] == "AKTIF") {
                                                                    echo "<a href='akses_status.php?id=$kolom[username]&st=$kolom[status]'  class='btn btn-primary btn-sm'>NON AKTIF</a> <br><br>";
                                                                } else {
                                                                    echo "<a href='akses_status.php?id=$kolom[username]&st=$kolom[status]'  class='btn btn-primary btn-sm'>AKTIF</a> <br><br>";
                                                                }
                                                                echo "<a href='akses_hapus.php?id=$kolom[username]&st=$kolom[status]'  class='btn btn-danger btn-sm'>HAPUS</a> <br><br>";
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
                        window.location="../index.php";
                        </script>';
        exit();
    }
}; ?>