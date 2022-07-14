<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    <title>RT Terpadu | Registrasi </title>
</head>

<body>
    <!-- Image and text -->
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Sistem Infomasi RT Terpadu
        </a>
    </nav>
    <div class="card text-center">
        <div class="card-header">
            <h2>Selamat Datang Di Sistem Informasi RT Terpadu</h2>
            <h4>RT 001 / RW 06 Kelurahan Jati Padang</h4>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm text-left">
                        <div class="alert alert-success" role="alert">
                            Hallo warga, silakan registrasi data anda untuk menjadi warga yang baik...
                        </div>
                        <form method="POST" action="register.php">
                            <div class="form-group text-left">
                                <label for="exampleInputEmail1">Nomor Kartu Keluarga</label>
                                <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="3174xxxxx">
                            </div>
                            <div class="form-group text-left">
                                <label for="exampleInputEmail1">Nama Kepala Keluarga</label>
                                <input type="text" class="form-control" id="nama_kk" name="nama_kk" placeholder="Ahmad Zulfikar">
                            </div>
                            <div class="form-group text-left">
                                <label for="exampleInputEmail1">NIK Kepala Keluarga</label>
                                <input type="number" class="form-control" id="nik_kk" name="nik_kk" placeholder="31740xxxxxxxx">
                            </div>
                            <div class="form-group text-left">
                                <label for="exampleInputEmail1">Nomor HP Kepala Keluarga</label>
                                <input type="number" class="form-control" id="hp" name="hp" placeholder="0812xxxxxxx">
                            </div>
                            <div class="form-group text-left">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="zulfikar@gmail.com">
                            </div>
                            <div class="form-group text-left">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" value="submit" class="btn btn-primary">Registrasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            Copyright Ahmad Zulfikar - Gunadarma University &copy 2021
        </div>
    </div>
</body>

</html>