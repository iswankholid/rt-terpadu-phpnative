<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Dashboard|RT</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['rules'] == "") {
        header("location:../index.php?pesan=unlogin");
    }

    ?>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="../assets/img/logo.jpg" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kepalakeluarga.php">
                                <i class="fas fa-user-shield"></i>
                                <span class="nav-link-text">Kepala keluarga</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="datakeluarga.php">
                                <i class="fas fa-user-friends"></i>
                                <span class="nav-link-text">Data Keluarga</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="nav-link-text">Logout</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->

    <div class="main-content" id="panel">
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-1">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Warga</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><i class="fas fa-user"></i></li>
                                    <li class="breadcrumb-item"><?php echo $_SESSION['email']; ?> / <?php echo $_SESSION['no_kk']; ?> </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <?php
            include '../koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "select * from data_warga where id='$id'");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <div class="container mt-3">
                    <div class="p-3 mb-2 bg-success text-white">Detail Data Anggota Keluarga</div>
                    <span class="badge badge-primary mb-2">Nama: <?php echo $d['nama']; ?></span><br>
                    <span class="badge badge-primary mb-2">NIK: <?php echo $d['nik']; ?></span><br>
                    <span class="badge badge-primary mb-2">Jenis Kelamin: <?php echo $d['jenkel']; ?></span><br>
                    <span class="badge badge-primary mb-2">Tempat Tanggal Lahir: <?php echo $d['tmp_lahir']; ?>, <?php echo $d['tgl_lahir']; ?></span><br>
                    <span class="badge badge-primary mb-2">Status Pernikahan: <?php echo $d['nikah']; ?></span><br>
                    <span class="badge badge-primary mb-2">Status Keluarga: <?php echo $d['status']; ?></span><br>
                    <span class="badge badge-primary mb-2">Pekerjaan: <?php echo $d['pekerjaan']; ?></span><br>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    </div>
    <!-- Page content -->
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>