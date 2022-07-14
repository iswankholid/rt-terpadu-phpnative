<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Dashboard | Anggota Keluarga</title>
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
    header("location:index.php?pesan=gagal");
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
        </div>
      </div>
    </div>
    <div class="mt-2 ml-1">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Tambah Anggota Keluarga
      </button>
      <?php
      include '../koneksi.php';
      $sql = mysqli_query($koneksi, "select * from data_warga where kk='$_SESSION[no_kk]'");
      $jumlahdata    = mysqli_num_rows($sql);
      if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "sukses") {
          echo "<div class='badge badge-success mt-2'>Data berhasil ditambahkan</div>";
        }
        if ($_GET['pesan'] == "hapus") {
          echo "<div class='badge badge-danger mt-2'>Data berhasil dihapus</div>";
        }
        if ($_GET['pesan'] == "ubah") {
          echo "<div class='badge badge-info mt-2'>Data berhasil diubah</div>";
        }
      }
      ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Status Keluarga</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Keterangan</th>
          </tr>
        </thead>
        <?php
        while ($d = mysqli_fetch_array($sql)) {
        ?>
          <tbody>
            <tr>
              <td><?php echo $d['nik']; ?></td>
              <td><?php echo $d['nama']; ?></td>
              <td><?php echo $d['status']; ?></td>
              <td><?php echo $d['tgl_lahir']; ?></td>
              <td>
                <a href="info.php?id=<?php echo $d['id']; ?>" class="badge badge-info">INFO</a>
                <a href="edit.php?id=<?php echo $d['id']; ?>" class="badge badge-success">EDIT</a>
                <a href="hapus.php?id=<?php echo $d['id']; ?>" class="badge badge-danger">HAPUS</a>
              </td>
            </tr>
          </tbody>
        <?php
        }
        ?>
      </table>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Anggota Keluarga</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="tambahkeluarga.php">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select class="form-control" name="jk" id="jk">
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tempat Lahir</label>
                <input type="text" class="form-control" id="tmp_lhr" name="tmp_lhr" placeholder="Kota Lahir">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lhr" name="tgl_lhr" placeholder="Kota Lahir">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Status Keluarga</label>
                <select class="form-control" id="status" name="status">
                  <option value="Istri">Istri</option>
                  <option value="Anak">Anak</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Status Pernikahan</label>
                <select class="form-control" id="nikah" name="nikah">
                  <option value="Nikah">Nikah</option>
                  <option value="Belum Menikah">Belum Menikah</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Pekerjaan</label>
                <select class="form-control" name="pekerjaan" id="pekerjaan">
                  <option value="Aparatur Sipil Negara">Aparatur Sipil Negara</option>
                  <option value="Pegawai Swasta">Pegawai Swasta</option>
                  <option value="Wiraswasta/Pedagang">Wiraswasta/Pedagang</option>
                  <option value="Pelajar">Pelajar</option>
                  <option value="Tidak/Belum Bekerja">Tidak/Belum Bekerja</option>
                </select>
              </div>
              <button type="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Anggota Keluarga</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        </div>
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