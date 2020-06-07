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
            <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
            <link href="../css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
            <link href="../css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
            <link href="../css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
            <link href="../css/plugins/cropper/cropper.min.css" rel="stylesheet">
            <link href="../css/plugins/switchery/switchery.css" rel="stylesheet">
            <link href="../css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
            <link href="../css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
            <link href="../css/plugins/datapicker/datepicker3.css" rel="stylesheet">
            <link href="../ss/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
            <link href="../css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
            <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
            <link href="../css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
            <link href="../css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
            <link href="../css/plugins/select2/select2.min.css" rel="stylesheet">
            <link href="../css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
            <link href="../css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">
            <link href="../css/animate.css" rel="stylesheet">
            <link href="../css/style.css" rel="stylesheet">

            <link rel="stylesheet" href="as.css">


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

                    ?>
                    <div class="row wrapper border-bottom white-bg page-heading">
                        <div class="col-lg-10">
                            <h2>Penambahan Data Bahan Orderan </h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a>Forms</a>
                                </li>
                                <li class="active">
                                    <strong>Input Data</strong>
                                </li>
                            </ol>
                        </div>
                        <div class="col-lg-2">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <?php
                                    $qbahan = mysqli_query($koneksi, "SELECT * FROM detail_bahan WHERE id_detail_bahan='$_GET[id]' ");
                                    $bahan = mysqli_fetch_assoc($qbahan);

                                    $qdetail = mysqli_query($koneksi, "SELECT * FROM detail_orderan_kastem WHERE id_orderan='$bahan[id_orderan]' ");
                                    $detail = mysqli_fetch_assoc($qdetail);
                                    ?>
                                    <h3>Edit Bahan Orderan</h3>
                                    <h4><?php echo "$detail[nama_kastem] <br> $detail[kategori_kastem]"; ?></h4>
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

                                    <form class="form-horizontal m-t-md" action="bahan-edit-proses.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group" hidden>
                                            <label class="col-sm-2 col-sm-2 control-label">id order</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="id" value="<?php echo "$detail[id_orderan]"; ?> ">
                                            </div>
                                        </div>
                                        <div class="form-group" hidden>
                                            <label class="col-sm-2 col-sm-2 control-label">id bahan</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="detail" value="<?php echo "$bahan[id_detail_bahan]"; ?> ">
                                            </div>
                                        </div>
                                        <div class="after-add-more">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Bahan</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control m-b" name="bahan">
                                                        <?php

                                                        $qeb = mysqli_query($koneksi, "SELECT * FROM bahan inner join bahan_kategori on bahan.id_bahan_kategori=bahan_kategori.id_bahan_kategori WHERE id_bahan='$bahan[id_bahan]'");
                                                        $eb = mysqli_fetch_assoc($qeb);
                                                        echo "<option value='$eb[id_bahan]' >$eb[nama_bahan] || $eb[bahan_kategori]</option>";


                                                        $qbhn = mysqli_query($koneksi, "SELECT * FROM bahan inner join bahan_kategori on bahan.id_bahan_kategori=bahan_kategori.id_bahan_kategori");
                                                        while ($bhn = mysqli_fetch_assoc($qbhn)) {
                                                            echo "<option value='$bhn[id_bahan]' >$bhn[nama_bahan] || $bhn[bahan_kategori]</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Jumlah Bahan</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="jml" value="<?php echo "$bahan[jml]"; ?>">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <button class="btn btn-primary" type="submit">Save </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include 'footer.php'; ?>
                </div>

            </div>
            </div>

            <!-- Mainly scripts -->
            <script src="../js/jquery-3.1.1.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <!-- Custom and plugin javascript -->
            <script src="../js/inspinia.js"></script>
            <script src="../js/plugins/pace/pace.min.js"></script>
            <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
            <!-- Chosen -->
            <script src="../js/plugins/chosen/chosen.jquery.js"></script>
            <!-- JSKnob -->
            <script src="../js/plugins/jsKnob/jquery.knob.js"></script>
            <!-- Input Mask-->
            <script src="../js/plugins/jasny/jasny-bootstrap.min.js"></script>
            <!-- Data picker -->
            <script src="../js/plugins/datapicker/bootstrap-datepicker.js"></script>
            <!-- NouSlider -->
            <script src="../js/plugins/nouslider/jquery.nouislider.min.js"></script>
            <!-- Switchery -->
            <script src="../js/plugins/switchery/switchery.js"></script>
            <!-- IonRangeSlider -->
            <script src="../js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
            <!-- iCheck -->
            <script src="../js/plugins/iCheck/icheck.min.js"></script>
            <!-- MENU -->
            <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
            <!-- Color picker -->
            <script src="../js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
            <!-- Clock picker -->
            <script src="../js/plugins/clockpicker/clockpicker.js"></script>
            <!-- Image cropper -->
            <script src="../js/plugins/cropper/cropper.min.js"></script>
            <!-- Date range use moment.js same as full calendar plugin -->
            <script src="../js/plugins/fullcalendar/moment.min.js"></script>
            <!-- Date range picker -->
            <script src="../js/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Select2 -->
            <script src="../js/plugins/select2/select2.full.min.js"></script>
            <!-- TouchSpin -->
            <script src="../js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>
            <!-- Tags Input -->
            <script src="../js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
            <!-- Dual Listbox -->
            <script src="../js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>
            <script src="k.js"></script>

            <script>
                $(document).ready(function() {
                    $(".add-more").click(function() {
                        var html = $(".copy").html();
                        $(".after-add-more").after(html);
                    });
                    $("body").on("click", ".remove", function() {
                        $(this).parents(".control-group").remove();
                    });
                });

                $('.chosen-select').chosen({
                    width: "100%"
                });

                $("#ionrange_1").ionRangeSlider({
                    min: 0,
                    max: 5000,
                    type: 'double',
                    prefix: "$",
                    maxPostfix: "+",
                    prettify: false,
                    hasGrid: true
                });

                $("#ionrange_2").ionRangeSlider({
                    min: 0,
                    max: 10,
                    type: 'single',
                    step: 0.1,
                    postfix: " carats",
                    prettify: false,
                    hasGrid: true
                });

                $("#ionrange_3").ionRangeSlider({
                    min: -50,
                    max: 50,
                    from: 0,
                    postfix: "°",
                    prettify: false,
                    hasGrid: true
                });

                $("#ionrange_4").ionRangeSlider({
                    values: [
                        "January", "February", "March",
                        "April", "May", "June",
                        "July", "August", "September",
                        "October", "November", "December"
                    ],
                    type: 'single',
                    hasGrid: true
                });

                $("#ionrange_5").ionRangeSlider({
                    min: 10000,
                    max: 100000,
                    step: 100,
                    postfix: " km",
                    from: 55000,
                    hideMinMax: true,
                    hideFromTo: false
                });

                $(".dial").knob();

                var basic_slider = document.getElementById('basic_slider');

                noUiSlider.create(basic_slider, {
                    start: 40,
                    behaviour: 'tap',
                    connect: 'upper',
                    range: {
                        'min': 20,
                        'max': 80
                    }
                });

                var range_slider = document.getElementById('range_slider');

                noUiSlider.create(range_slider, {
                    start: [40, 60],
                    behaviour: 'drag',
                    connect: true,
                    range: {
                        'min': 20,
                        'max': 80
                    }
                });

                var drag_fixed = document.getElementById('drag-fixed');

                noUiSlider.create(drag_fixed, {
                    start: [40, 60],
                    behaviour: 'drag-fixed',
                    connect: true,
                    range: {
                        'min': 20,
                        'max': 80
                    }
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