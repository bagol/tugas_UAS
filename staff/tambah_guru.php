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
        <h3 class="title-5 m-b-35">Data Murid</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    
                </div>
                </div>
            <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#exampleModal">
                    <i class="zmdi zmdi-plus"></i>Tambah Guru</button>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../koneksi.php');

                    $no=1;
                    $sql="select * from guru ";
                    $query = mysqli_query($koneksi,$sql);
                    while($hasil = mysqli_fetch_array($query)){
                    ?>
                    <tr class="tr-shadow">
                        <td> <?= $no; ?> </td>
                        <td><?= $hasil['nama'];?></td>
                        <td><?= $hasil['nip'];?></td>
                        <td ><?= $hasil['alamat'];?></td>
                        <td>
                            <span class="block-email"><?= $hasil['email'];?></span>
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit<?= $hasil['nip'];?>" data-placement="top" title="Ubah">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item" data-toggle="modal" data-target="#hapus<?= $hasil['nip'];?>" data-placement="top" title="Hapus">
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

<!-- Modal tambah guru -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="tambah_user.php" method="post">
                <input type="hidden" name="user" value="guru">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">NIP</label>
                    <input type="text" maxlength="12"  name="nip" placeholder="Masukan NIP" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Nama</label>
                    <input type="text"  name="nama" placeholder="Masukan Nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Almat</label>
                    <input type="text"  name="alamat" placeholder="Tuliskan Alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Email</label>
                    <input type="email"  name="email" placeholder="Tuliskan Alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Password</label>
                    <input type="password"  name="password" placeholder="Masukan Password" class="form-control">
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

    <?php $sql="select * from guru ";
    $query = mysqli_query($koneksi,$sql);
    while($edit = mysqli_fetch_array($query)){
    ?>
<!-- Modal edit guru -->
<div class="modal fade" id="edit<?= $edit['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="edit_user.php" method="post">
                <input type="hidden" name="user" value="guru">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">NIP</label>
                    <input type="text" maxlength="12"  name="nip" value="<?= $edit['nip'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Nama</label>
                    <input type="text"  name="nama" value="<?= $edit['nama'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Almat</label>
                    <input type="text"  name="alamat" value="<?= $edit['alamat'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Email</label>
                    <input type="email"  name="email" value="<?= $edit['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Password</label>
                    <input type="password"  name="password" placeholder="Masukan Password baru" class="form-control">
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

    <!-- Modal Hapus -->
    <?php
    $sql="select * from guru";
    $query = mysqli_query($koneksi,$sql);
    while($hapus = mysqli_fetch_array($query)){
    ?>
        <div class="modal fade" id="hapus<?= $hapus['nip']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apa Anda Yakin Ingin Menghapus akun <b><?= $hapus['nama']?></b> ?
            </div>
            <div class="modal-footer">
                <form action="hapus_user.php" method="post">
                <input type="hidden" name="user" value="guru">
                <input type="hidden" name="nip" value="<?= $hapus['nip']?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Iya</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php } ?>


<?php include('../template/footer.php'); ?>