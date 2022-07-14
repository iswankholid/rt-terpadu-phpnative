<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$no_kk = $_POST['no_kk'];
$nama_kk = $_POST['nama_kk'];
$nik_kk = $_POST['nik_kk'];
$hp = $_POST['hp'];
$email = $_POST['email'];
$password = $_POST['password'];
$rules = 'warga';
$status = 'Kepala Keluarga';

// menginput data ke database
mysqli_query($koneksi, "insert into kepala_keluarga values('','$no_kk','$nama_kk','$nik_kk','$hp','$email','$password','$rules')");
mysqli_query($koneksi, "insert into data_warga values('','$no_kk','$nik_kk','$nama_kk','','','','','','$status')");

// mengalihkan halaman kembali ke index.php
header("location:index.php?pesan=sukses");
