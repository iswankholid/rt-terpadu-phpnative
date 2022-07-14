<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/dki.png" type="image/ico" />

    <title>Dashboard RT | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <?php
    include '../../koneksi.php';
    session_start();
    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['rules'] == "") {
        header("location:../../index.php?pesan=unlogin");
    }
    ?>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/profile.png" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Hallo,</span>
                            <?php echo $_SESSION['email']; ?>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <a href="index.php">
                                <h3>Home</h3>
                            </a>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Warga <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="kkeluarga.php">Data Keluarga</a></li>
                                        <li><a href="warga.php">Data Warga</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Admin <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="admin.php">Data Admin</a></li>
                                        <li><a href="info.php">Informasi</a></li>
                                        <li><a href="../../logout.php">LogOut</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <?php

            $sql = mysqli_query($koneksi, "select * from data_warga");
            $jumlahdata    = mysqli_num_rows($sql);
            $sql2 = mysqli_query($koneksi, "select * from data_warga where jenkel='Laki-Laki'");
            $jumlahlaki    = mysqli_num_rows($sql2);
            $sql3 = mysqli_query($koneksi, "select * from data_warga where  jenkel='Perempuan'");
            $jumlahcewe    = mysqli_num_rows($sql3);
            $sql4 = mysqli_query($koneksi, "select * from data_warga where  status='Kepala Keluarga'");
            $jumlahkk  = mysqli_num_rows($sql4);
            ?>
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row" style="display: inline-block;">
                    <div class="tile_count">
                        <div class="col-md-3 col-sm-3  tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Kepala Keluarga</span>
                            <div class="count"><?php echo $jumlahkk; ?></div>
                        </div>
                        <div class="col-md-3 col-sm-3  tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i> Total Warga</span>
                            <div class="count"><?php echo $jumlahdata; ?></div>
                        </div>
                        <div class="col-md-3 col-sm-3  tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Laki- Laki</span>
                            <div class="count"><?php echo $jumlahlaki; ?></div>
                        </div>
                        <div class="col-md-3 col-sm-3  tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Perempuan</span>
                            <div class="count"><?php echo $jumlahcewe; ?></div>
                        </div>
                    </div>
                </div>
                <!-- /top tiles -->

                <div class="row">
                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title">
                                <h2>Jenis Kelamin</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="" style="width:100%">
                                    <tr>
                                        <td>
                                            <table class="tile_info">
                                                <tr>
                                                    <td>Persentase</td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $persencowok = $jumlahlaki / $jumlahdata * 100;
                                                    $persencowoks = number_format($persencowok, 2);
                                                    ?>
                                                    <td>
                                                        <p><i class="fa fa-square blue"></i>Laki-Laki </p>
                                                    </td>
                                                    <td><?php echo $persencowoks; ?></td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $persencewek = $jumlahcewe / $jumlahdata * 100;
                                                    $persenceweks = number_format($persencewek, 2);
                                                    ?>
                                                    <td>
                                                        <p><i class="fa fa-square red"></i>Perempuan </p>
                                                    </td>
                                                    <td><?php echo $persenceweks; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="widget_summary">
                                                <div class="w_left w_25">
                                                    <span>Laki-Laki</span>
                                                </div>
                                                <div class="w_center w_55">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jumlahlaki ?>%;"></div>
                                                    </div>
                                                </div>
                                                <div class="w_right w_20">
                                                    <span><?php echo $jumlahlaki ?></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="widget_summary">
                                                <div class="w_left w_25">
                                                    <span>Perempuan</span>
                                                </div>
                                                <div class="w_center w_55">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jumlahcewe ?>%;"></div>
                                                    </div>
                                                </div>
                                                <div class="w_right w_20">
                                                    <span><?php echo $jumlahcewe ?></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2>Pekerjaan</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="widget_summary">
                                    <?php
                                    $sql5 = mysqli_query($koneksi, "select * from data_warga where  pekerjaan='Aparatur Sipil Negara'");
                                    $jumlahasn  = mysqli_num_rows($sql5);
                                    ?>
                                    <div class="w_left w_25">
                                        <span>ASN</span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jumlahasn ?>%;"></div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?php echo $jumlahasn ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <?php
                                    $sql6 = mysqli_query($koneksi, "select * from data_warga where  pekerjaan='Pegawai Swasta'");
                                    $jumlahswasta  = mysqli_num_rows($sql6);
                                    ?>
                                    <div class="w_left w_25">
                                        <span>Pegawai Swasta</span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jumlahswasta ?>%;"></div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?php echo $jumlahswasta ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <?php
                                    $sql7 = mysqli_query($koneksi, "select * from data_warga where  pekerjaan='Wiraswasta/Pedagang'");
                                    $jumlahwiraswasta  = mysqli_num_rows($sql7);
                                    ?>
                                    <div class="w_left w_25">
                                        <span>Wiraswasta</span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jumlahwiraswasta ?>%;"></div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?php echo $jumlahwiraswasta ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <?php
                                    $sql8 = mysqli_query($koneksi, "select * from data_warga where  pekerjaan='Pelajar'");
                                    $jumlahpelajar  = mysqli_num_rows($sql8);
                                    ?>
                                    <div class="w_left w_25">
                                        <span>Pelajar / Mahasiswa</span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jumlahpelajar ?>%;"></div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?php echo $jumlahpelajar ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget_summary">
                                    <?php
                                    $sql8 = mysqli_query($koneksi, "select * from data_warga where  pekerjaan='Tidak/Belum Bekerja'");
                                    $jumlahtidakbekerja = mysqli_num_rows($sql8);
                                    ?>
                                    <div class="w_left w_25">
                                        <span>Tidak Bekerja</span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $jumlahtidakbekerja ?>%;"></div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?php echo $jumlahtidakbekerja ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel tile fixed_height_320">
                            <div class="x_title">
                                <h2>Quick Settings</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Settings 1</a>
                                            <a class="dropdown-item" href="#">Settings 2</a>
                                        </div>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="dashboard-widget-content">
                                    <ul class="quick-list">
                                        <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                                        </li>
                                        <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                                        </li>
                                        <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                                        <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                                        </li>
                                        <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                                        <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                                        </li>
                                        <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
                                        </li>
                                    </ul>

                                    <div class="sidebar-widget">
                                        <h4>Profile Completion</h4>
                                        <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                                        <div class="goal-wrapper">
                                            <span id="gauge-text" class="gauge-value pull-left">0</span>
                                            <span class="gauge-value pull-left">%</span>
                                            <span id="goal-text" class="goal-value pull-right">100%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php

                $sql = mysqli_query($koneksi, "select * from info");
                $jumlahdata    = mysqli_num_rows($sql);
                ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Informasi Warga <small>Mohon dibaca</small></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="dashboard-widget-content">
                                            <ul class="list-unstyled timeline widget">
                                                <?php
                                                while ($d = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <li>
                                                        <div class="block">
                                                            <div class="block_content">
                                                                <h2 class="title">
                                                                    <a><?php echo $d['nama']; ?></a>
                                                                </h2>
                                                                <div class="byline">
                                                                    <span><?php echo $d['tgl']; ?></span>
                                                                </div>
                                                                <p class="excerpt"><?php echo $d['info']; ?></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Developer: Ahmad Zulfikar
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>