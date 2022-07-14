<?php
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenkel = $_POST['jk'];
$tmp_lahir = $_POST['tmp_lhr'];
$tgl_lahir = $_POST['tgl_lhr'];
$nikah = $_POST['nikah'];
$pekerjaan = $_POST['pekerjaan'];
$status = $_POST['status'];

// update data ke database
mysqli_query($koneksi, "update data_warga set nik='$nik', nama='$nama', jenkel='$jenkel', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', nikah='$nikah', pekerjaan='$pekerjaan', status='$status' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:datakeluarga.php?pesan=ubah");
