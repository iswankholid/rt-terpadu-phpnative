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
          <!-- Card stats -->
          <?php
          include '../koneksi.php';
          $sql = mysqli_query($koneksi, "select * from data_warga where kk='$_SESSION[no_kk]'");
          $jumlahdata    = mysqli_num_rows($sql);
          $sql2 = mysqli_query($koneksi, "select * from data_warga where kk='$_SESSION[no_kk]' and jenkel='Laki-Laki'");
          $jumlahlaki    = mysqli_num_rows($sql2);
          $sql3 = mysqli_query($koneksi, "select * from data_warga where kk='$_SESSION[no_kk]' and jenkel='Perempuan'");
          $jumlahcewe    = mysqli_num_rows($sql3);
          ?>
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Anggota Keluarga</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $jumlahdata; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Laki-laki</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $jumlahlaki; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Perempuan</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $jumlahcewe; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-3 mr-3 ml-3">
      <?php
      $data = mysqli_query($koneksi, "select * from info");
      while ($d = mysqli_fetch_array($data)) {
      ?>
        <div class="card pt-0">
          <div class="card-body">
            <div class="p-3 mb-2 bg-success text-white"><?php echo $d['nama']; ?></div>
            <span class="badge badge-primary"><?php echo $d['tgl']; ?></span>
            <p class="card-text"><?php echo $d['info']; ?></p>
          </div>
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