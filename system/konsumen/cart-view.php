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
                            <h2>Keranjang Belanja</h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="active">
                                    <strong>Keranjang Belanja</strong>
                                </li>
                            </ol>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>

                    <div class="wrapper wrapper-content animated fadeInRight">
                        <?php
                        $id = $_SESSION['id'];
                        $hasil = mysqli_query($koneksi, "SELECT * FROM cart inner join produk on cart.id_produk=produk.id_produk where id_konsumen='$id' ");
                        $ketemu = mysqli_num_rows($hasil);
                        ?>


                        <div class="row">
                            <div class="col-md-9">

                                <div class="ibox">
                                    <div class="ibox-title">
                                        <span class="pull-right">(<strong><?php echo "$ketemu" ?></strong>) items</span>
                                        <h5>Items di dalam keranjang</h5>
                                    </div>
                                    <form action="order-proses.php" method="POST" enctype="multipart/form-data">
                                        <?php
                                        while ($kolom = mysqli_fetch_assoc($hasil)) {
                                            $qkp = mysqli_query($koneksi, "SELECT * FROM kategori_produk WHERE id_kategori_produk='$kolom[id_kategori_produk]' ");
                                            $kp = mysqli_fetch_assoc($qkp);
                                        ?>
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <table class="table shoping-cart-table">

                                                        <tbody>
                                                            <tr>
                                                                <td width="90">
                                                                    <div class="cart-product-imitation">
                                                                        <img src="../assets/foto-produck/<?php echo "$kolom[gambar]"; ?>" width="100%">
                                                                    </div>
                                                                </td>
                                                                <td class="desc">
                                                                    <h3>
                                                                        <a href="#" class="text-navy">
                                                                            <?php echo "$kolom[nama_produk]"; ?>
                                                                        </a>
                                                                    </h3>
                                                                    <h5><strong>Kategori</strong> / <?php echo "$kp[nama_kategori]"; ?></h5>
                                                                    <p class="small">
                                                                        <div class="col-md-12">
                                                                            <dl class="small m-b-none">
                                                                                <dt>Deskripsi :</dt>
                                                                                <dd>
                                                                                    <?php echo "$kolom[keterangan]"; ?>
                                                                                </dd>
                                                                            </dl>
                                                                        </div>
                                                                    </p>

                                                                    <div class="m-t-sm">
                                                                        <br>
                                                                        <hr>
                                                                        <?php
                                                                        echo "<a href='cart-hapus.php?id=$kolom[id]'  class='btn btn-danger'><i class='fa fa-trash'></i></a> ";
                                                                        ?>
                                                                    </div>
                                                                </td>


                                                                <div class="form-group" hidden>
                                                                    <input type="text" class="form-control" name="harga[]" id="h" value="<?php echo "$kolom[harga]"; ?>">
                                                                </div>
                                                                <td id="t" readonly>
                                                                    <?php echo "Harga/items Rp. $kolom[harga]"; ?>
                                                                </td>
                                                                <td width="65">
                                                                    <div class="form-group" hidden>
                                                                        <input type="text" class="form-control" name="id" value="<?php echo "$kolom[id_konsumen]"; ?>">
                                                                        <input type="text" class="form-control" name="pro[]" value="<?php echo "$kolom[id_produk]"; ?>"></div>
                                                                    <input type="text" class="form-control" name="qrt[]" value="1">

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        <?php } ?>
                                        <div class="form-group" hidden>
                                            <input type="text" class="form-control" name="jlh" value="<?php echo "$ketemu"; ?>">
                                        </div>


                                        <div class="ibox-content">

                                            <button class="btn btn-primary pull-right" type="submit"><i class="fa fa fa-shopping-cart"></i> Checkout</button>
                                            <a href="katalog.php" class="btn btn-white"><i class="fa fa-arrow-left"></i> Continue shopping</a>

                                        </div>
                                    </form>
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

            <!-- Custom and plugin javascript -->
            <script src="../js/inspinia.js"></script>
            <script src="../js/plugins/pace/pace.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script type="text/javascript">
                $("#h,#j").keyup(function() {
                    var val1 = $('#h').val();
                    var val2 = $('#j').val();
                    var kali = Number(val1) * Number(val2);
                    if (val1 != "" && val2 != "") {
                        $('#t').val(kali);
                    }
                })
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
} ?>