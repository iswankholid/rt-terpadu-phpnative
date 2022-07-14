<div class="modal modal-update" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm_update" method="POST" action="pegawai/aksi_update.php">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="job">Pekerjaan</label>
                        <input type="text" class="form-control" name="job" id="job" placeholder="Masukkan Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
//aksi_edit.php
<?php
include "../koneksi.php";
$id = $_GET['id'];
$sql = "SELECT * from pegawai WHERE id=" . $id . "";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($query);
echo json_encode($data);
?>
//aksi_update.php
<?php
include "../koneksi.php";
$sql = "UPDATE pegawai SET name='$_POST[name]',
                                email='$_POST[email]',
                                job='$_POST[job]',
                                address='$_POST[address]'
            WHERE id='$_POST[id]'";
$query = mysqli_query($connect, $sql);
header("location:../index.php");
?>