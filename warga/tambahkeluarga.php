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
$status = $_POST['status'];

// menginput data ke database
mysqli_query($koneksi, "insert into data_warga values('','$kk','$nik','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$nikah','$pekerjaan','$status')");

// mengalihkan halaman kembali ke index.php
header("location:datakeluarga.php?pesan=sukses");
