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
    if ($_SESSION['akses'] == "KONSUMEN") {
?>
        <!DOCTYPE html>
        <html>

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>CV. KAYANA CITRA GEMILANG</title>

            <link href="../css/bootstrap.min.css" rel="stylesheet">
            <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

            <!-- Toastr style -->
            <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

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
                            <h2>Kategori Katalog Produck</h2>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <strong><a href="katalog.php">All</a></strong>
                                </li>
                                <?php
                                $qk = mysqli_query($koneksi, "SELECT * FROM  kategori_produk");
                                while ($hk = mysqli_fetch_assoc($qk)) {
                                ?>
                                    <li>
                                        <a href="<?php echo "katalog-kategori.php?id=$hk[id_kategori_produk]" ?>"><?php echo "$hk[nama_kategori]"; ?></a>
                                    </li>
                                <?php } ?>
                            </ol>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>

                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <?php
                            $hasil = mysqli_query($koneksi, "SELECT * FROM produk inner join kategori_produk on produk.id_kategori_produk=kategori_produk.id_kategori_produk   ");
                            while ($kolom = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <div class="col-md-3">
                                    <div class="ibox">
                                        <div class="ibox-content product-box">

                                            <div class=" product-imitation">
                                                <img src="<?php echo "../assets/foto-produck/$kolom[gambar]";
                                                            ?>" width="100%" />
                                            </div>
                                            <div class="product-desc">
                                                <span class="product-price">
                                                    <?php echo "Rp .100.000.000" ?>
                                                </span>
                                                <small class="text-muted"><strong>Kategori</strong> / <?php echo "$kolom[nama_kategori]"; ?></small>
                                                <a href="#" class="product-name"> <?php echo "$kolom[nama_produk]"; ?></a>
                                                <hr>
                                                <div class="small m-t-xs">
                                                    Ukuran :
                                                    <ul>
                                                        <?php
                                                        $qbhn = mysqli_query($koneksi, "SELECT * FROM detail_ukuran where id_produk='$kolom[id_produk]'   ");
                                                        while ($bhn = mysqli_fetch_assoc($qbhn)) {
                                                        ?>
                                                            <li><?php echo "$bhn[ukuran] : $bhn[cm]" ?></li>

                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                                <hr>
                                                <div class="m-t text-righ">

                                                    <a href="<?php echo "cart-add.php?id=$kolom[id_produk]"; ?>" class="btn   btn-primary"><i class="fa fa-plus"></i> <i class="fa fa-shopping-cart"></i></a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
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

            <!-- Custom and plugin javascript -->
            <script src="../js/inspinia.js"></script>
            <script src="../js/plugins/pace/pace.min.js"></script>

        </body>

        </html>


<?php  } else {
        echo '<script language="javascript">
                        alert ("Anda Tidak Punya Akses");
                        window.location="../assets/login/logout.php";
                        </script>';
        exit();
    }
} ?>