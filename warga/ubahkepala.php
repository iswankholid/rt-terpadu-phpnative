<?php
// koneksi database
session_start();
include '../koneksi.php';

// menangkap data yang di kirim dari form
$kk = $_SESSION['no_kk'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenkel = $_POST['jk'];
$tmp_lahir = $_POST['tmp_lhr'];
$tgl_lahir = $_POST['tgl_lhr'];
$nikah = $_POST['nikah'];
$pekerjaan = $_POST['pekerjaan'];

// update data ke database
mysqli_query($koneksi, "update data_warga set jenkel='$jenkel', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', nikah='$nikah', pekerjaan='$pekerjaan' where nik='$nik'");

// mengalihkan halaman kembali ke index.php
header("location:kepalakeluarga.php?pesan=sukses");
