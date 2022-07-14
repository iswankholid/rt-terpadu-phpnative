<?php
// koneksi database
include '../../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['kk'];


// menghapus data dari database
mysqli_query($koneksi, "delete from data_warga where kk='$id'");
mysqli_query($koneksi, "delete from kepala_keluarga where no_kk='$id'");

// mengalihkan halaman kembali ke index.php
header("location:kkeluarga.php?pesan=hapus");
