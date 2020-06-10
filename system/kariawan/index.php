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
            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <title>CV. KAYANA CITRA GEMILANG</title>

            <link href="../css/bootstrap.min.css" rel="stylesheet">
            <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

            <!-- Toastr style -->
            <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

            <!-- Gritter -->
            <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

            <link href="../css/animate.css" rel="stylesheet">
            <link href="../css/style.css" rel="stylesheet">

        </head>

        <body>
            <div id="wrapper">
                <nav class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <?php include "menu.php"; ?>
                    </div>
                </nav>

                <div id="page-wrapper" class="gray-bg dashbard-1">
                    <?php include "nav.php"; ?>
                    <div class="wrapper wrapper-content">
                        <?php
                        $hasil = mysqli_query($koneksi, "SELECT * FROM orderan ");
                        $total = mysqli_num_rows($hasil);
                        $tpro = 0;
                        $tkas = 0;
                        $ts = 0;
                        while ($kolom = mysqli_fetch_assoc($hasil)) {

                            if ($kolom['kategori'] == "PRODUCK") {
                                $tpro++;
                            } else {
                                $tkas++;
                            }
                            if ($kolom['status_order'] == "SELESAI") {
                                $ts++;
                            }
                        }
                        ?>
                        <div class="row">

                            <div class="col-lg-3">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Total Orderan</h5>
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo "$total"; ?></h1>
                                        <small>Total Order</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Orderan PRODUK</h5>
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo "$tpro"; ?></h1>
                                        <small>Total orderan PRODUCK</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Orderan KASTEM</h5>
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo "$tkas"; ?></h1>
                                        <small>Total orderan KASTEM</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Orderan Selesai </h5>
                                    </div>
                                    <div class="ibox-content">
                                        <h1 class="no-margins"><?php echo "$ts"; ?></h1>
                                        <small>Total orderan selesai</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php include 'footer.php'; ?>
                </div>

                <!-- Mainly scripts -->
                <script src="../js/jquery-3.1.1.min.js"></script>
                <script src="../js/bootstrap.min.js"></script>
                <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
                <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

                <!-- Flot -->
                <script src="../js/plugins/flot/jquery.flot.js"></script>
                <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
                <script src="../js/plugins/flot/jquery.flot.spline.js"></script>
                <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
                <script src="../js/plugins/flot/jquery.flot.pie.js"></script>

                <!-- Peity -->
                <script src="../js/plugins/peity/jquery.peity.min.js"></script>
                <script src="../js/demo/peity-demo.js"></script>

                <!-- Custom and plugin javascript -->
                <script src="../js/inspinia.js"></script>
                <script src="../js/plugins/pace/pace.min.js"></script>

                <!-- jQuery UI -->
                <script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

                <!-- GITTER -->
                <script src="../js/plugins/gritter/jquery.gritter.min.js"></script>

                <!-- Sparkline -->
                <script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

                <!-- Sparkline demo data  -->
                <script src="../js/demo/sparkline-demo.js"></script>

                <!-- ChartJS-->
                <script src="../js/plugins/chartJs/Chart.min.js"></script>

                <!-- Toastr -->
                <script src="../js/plugins/toastr/toastr.min.js"></script>


                <script>
                    $(document).ready(function() {
                        setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 4000
                            };

                        }, 1300);


                        var data1 = [
                            [0, 4],
                            [1, 8],
                            [2, 5],
                            [3, 10],
                            [4, 4],
                            [5, 16],
                            [6, 5],
                            [7, 11],
                            [8, 6],
                            [9, 11],
                            [10, 30],
                            [11, 10],
                            [12, 13],
                            [13, 4],
                            [14, 3],
                            [15, 3],
                            [16, 6]
                        ];
                        var data2 = [
                            [0, 1],
                            [1, 0],
                            [2, 2],
                            [3, 0],
                            [4, 1],
                            [5, 3],
                            [6, 1],
                            [7, 5],
                            [8, 2],
                            [9, 3],
                            [10, 2],
                            [11, 1],
                            [12, 0],
                            [13, 2],
                            [14, 8],
                            [15, 0],
                            [16, 0]
                        ];
                        $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                            data1, data2
                        ], {
                            series: {
                                lines: {
                                    show: false,
                                    fill: true
                                },
                                splines: {
                                    show: true,
                                    tension: 0.4,
                                    lineWidth: 1,
                                    fill: 0.4
                                },
                                points: {
                                    radius: 0,
                                    show: true
                                },
                                shadowSize: 2
                            },
                            grid: {
                                hoverable: true,
                                clickable: true,
                                tickColor: "#d5d5d5",
                                borderWidth: 1,
                                color: '#d5d5d5'
                            },
                            colors: ["#1ab394", "#1C84C6"],
                            xaxis: {},
                            yaxis: {
                                ticks: 4
                            },
                            tooltip: false
                        });

                        var doughnutData = {
                            labels: ["App", "Software", "Laptop"],
                            datasets: [{
                                data: [300, 50, 100],
                                backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"]
                            }]
                        };


                        var doughnutOptions = {
                            responsive: false,
                            legend: {
                                display: false
                            }
                        };


                        var ctx4 = document.getElementById("doughnutChart").getContext("2d");
                        new Chart(ctx4, {
                            type: 'doughnut',
                            data: doughnutData,
                            options: doughnutOptions
                        });

                        var doughnutData = {
                            labels: ["App", "Software", "Laptop"],
                            datasets: [{
                                data: [70, 27, 85],
                                backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"]
                            }]
                        };


                        var doughnutOptions = {
                            responsive: false,
                            legend: {
                                display: false
                            }
                        };


                        var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
                        new Chart(ctx4, {
                            type: 'doughnut',
                            data: doughnutData,
                            options: doughnutOptions
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