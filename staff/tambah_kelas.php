<?php
    session_start();
    if($_SESSION['role'] !== 'staff'){
        header("location:../cek_session.php");  
    }
    include('../template/header.php');
?>
<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Data Kelas</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    
                </div>
                </div>
            <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#exampleModal">
                    <i class="zmdi zmdi-plus"></i>Tambah Kelas</button>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../koneksi.php');

                    $no=1;
                    $sql="select * from kelas ";
                    $query = mysqli_query($koneksi,$sql);
                    while($hasil = mysqli_fetch_array($query)){
                    ?>
                    <tr class="tr-shadow">
                        <td> <?= $no; ?> </td>
                        <td><?= $hasil['no_kelas'];?></td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit<?= $hasil['no_kelas'];?>" data-placement="top" title="Ubah">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item" data-toggle="modal" data-target="#hapus<?= $hasil['no_kelas'];?>" data-placement="top" title="Hapus">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="spacer"></tr>
                <?php $no++; } ?>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

<!-- footer --->
<?php include('../template/footer1.php'); ?>

<!-- Modal tambah kelas -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah kelas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="manage_kelas.php" method="post">
                <input type="hidden" name="manage" value="simpan">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">No Kelas</label>
                    <input type="text" maxlength="2"  name="no_kelas" placeholder="Masukan No Kelas" class="form-control">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal ubah kelas -->
    <?php
    $sql="select * from kelas ";
    $query = mysqli_query($koneksi,$sql);
    while($e = mysqli_fetch_array($query)){
    ?>
<div class="modal fade" id="edit<?= $e['no_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah kelas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="manage_kelas.php" method="post">
                <input type="hidden" name="manage" value="ubah">
                <input type="hidden" name="id" value="<?= $e['id'] ?>">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">No Kelas</label>
                    <input type="text" maxlength="2"  name="no_kelas" value="<?= $e['no_kelas'] ?>" class="form-control">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
        </div>
        </div>
    </div>
    </div>
    <?php } ?>

    <!-- Modal hapus kelas -->
    <?php
    $sql="select * from kelas ";
    $query = mysqli_query($koneksi,$sql);
    while($h = mysqli_fetch_array($query)){
    ?>
<div class="modal fade" id="hapus<?= $h['no_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah kelas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Apa anda yakin ingin menghapus kelas <?= $h['no_kelas'] ?> ?
            <form action="manage_kelas.php" method="post">
                <input type="hidden" name="manage" value="hapus">
                <input type="hidden" name="id" value="<?= $h['id'] ?>">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
        </div>
        </div>
    </div>
    </div>
    <?php } ?>

<?php include('../template/footer.php'); ?>