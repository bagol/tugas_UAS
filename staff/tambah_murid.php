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
                    <i class="zmdi zmdi-plus"></i>Tambah Murid</button>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No Tlpn</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../koneksi.php');

                    $no=1;
                    $sql="select * from murid ";
                    $query = mysqli_query($koneksi,$sql);
                    while($hasil = mysqli_fetch_array($query)){
                    ?>
                    <tr class="tr-shadow">
                        <td> <?= $no; ?> </td>
                        <td><?= $hasil['nama'];?></td>
                        <td><?= $hasil['nis'];?></td>
                        <td ><?= $hasil['alamat'];?></td>
                        <td>
                            <span class="block-email"><?= $hasil['email'];?></span>
                        </td>
                        <td><?= $hasil['notlpn'];?></td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit<?= $hasil['nis'];?>" data-placement="top" title="Ubah">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item" data-toggle="modal" data-target="#hapus<?= $hasil['nis'];?>" data-placement="top" title="Hapus">
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

<!-- Modal tambah murid -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Murid</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="tambah_user.php" method="post">
                <input type="hidden" name="user" value="murid">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">NIS</label>
                    <input type="text" maxlength="12"  name="nis" placeholder="Masukan NIS" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Nama</label>
                    <input type="text"  name="nama" placeholder="Masukan Nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Password</label>
                    <input type="password"  name="password" placeholder="Masukan Password" class="form-control">
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
                    <label for="nf-email" class=" form-control-label">No Telphon</label>
                    <input type="text" maxlength="13"  name="notlpn" placeholder="Tuliskan Nomer Telephon" class="form-control">
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

    <!-- Modal Hapus -->
    <?php
    include('../koneksi.php');
    $sql="select * from murid";
    $query = mysqli_query($koneksi,$sql);
    while($hapus = mysqli_fetch_array($query)){
    ?>
        <div class="modal fade" id="hapus<?= $hapus['nis']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apa Anda Yakin Ingin Menghapus akun <b><?= $hapus['nama']?></b> ?
            </div>
            <div class="modal-footer">
                <form action="hapus_user.php" method="post">
                <input type="hidden" name="nis" value="<?= $hapus['nis']?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Iya</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Modal edit -->
    
    <?php
    include('../koneksi.php');
    $sql="select * from murid";
    $query = mysqli_query($koneksi,$sql);
    while($edit = mysqli_fetch_array($query)){
    ?>
    <div class="modal fade" id="edit<?= $edit['nis'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="edit_user.php" method="post">
            <input type="hidden" name="user" value="murid">
            <div class="form-group">
                <label for="nf-email" class=" form-control-label">NIS</label>
                <input type="text" maxlength="12"  name="nis" value="<?=$edit['nis'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="nf-email" class=" form-control-label">Nama</label>
                <input type="text"  name="nama" value="<?=$edit['nama'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="nf-password" class=" form-control-label">Password</label>
                <input type="password"  name="password" placeholder="Masukan Password Baru..." class="form-control">
            </div>
            <div class="form-group">
                <label for="nf-email" class=" form-control-label">Almat</label>
                <input type="text"  name="alamat" value="<?=$edit['alamat'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="nf-email" class=" form-control-label">Email</label>
                <input type="email"  name="email" value="<?=$edit['email'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="nf-email" class=" form-control-label">No Telphon</label>
                <input type="text" maxlength="13"  name="notlpn" value="<?=$edit['notlpn'] ?>" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    <?php } ?>

<?php include('../template/footer.php'); ?>