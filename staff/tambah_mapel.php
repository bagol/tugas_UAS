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
        <h3 class="title-5 m-b-35">Data Mapel</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    
                </div>
                </div>
            <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#exampleModal">
                    <i class="zmdi zmdi-plus"></i>Tambah Mapel</button>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mapel</th>
                        <th>NIP</th>
                        <th>Nama Pengajar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../koneksi.php');

                    $no=1;
                    $sql="select a.id as id, a.nama as nama_mapel, b.nama as nama_guru, b.nip as nip from mapel a inner join guru b on a.nip=b.nip ";
                    $query = mysqli_query($koneksi,$sql);
                    $sql1="select * from guru";
                    $query1 = mysqli_query($koneksi,$sql1);
                    $pengajar = array();
                    $noo = 0 ;
                    while($hasil = mysqli_fetch_array($query1)){
                        $pengajar[$noo++] = array('nip' => $hasil['nip'], 'nama' => $hasil['nama']);
                    $length = count($pengajar);
                    }
                    while($hasil = mysqli_fetch_array($query)){
                    ?>
                    <tr class="tr-shadow">
                        <td> <?= $no; ?> </td>
                        <td><?= $hasil['nama_mapel'];?></td>
                        <td><?= $hasil['nip'];?></td>
                        <td ><?= $hasil['nama_guru'];?></td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="modal" data-target="#edit<?= $hasil['id'];?>" data-placement="top" title="Ubah">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item" data-toggle="modal" data-target="#hapus<?= $hasil['id'];?>" data-placement="top" title="Hapus">
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

<?php include('../template/footer1.php'); ?>

<!-- Modal tambah Mapel -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="manage_mapel.php" method="post">
                <input type="hidden" name="manage" value="simpan">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Nama</label>
                    <input type="text"  name="nama" placeholder="Masukan Nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Pilih Pengajar</label>
                    <select name="nip" id="select" class="form-control">
                        <?php $sql="select nip, nama from guru";
                        $query = mysqli_query($koneksi,$sql);
                        while($guru = mysqli_fetch_array($query)){ ?>
                        <option value="<?= $guru['nip'] ?>"><?= $guru['nama'] ?></option>
                        <?php } ?>
                    </select>
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

<!-- Modal edit Mapel -->
<?php
    include 'koneksi.php';
    $sql="select a.id as id, a.nama as nama_mapel, b.nama as nama_guru, b.nip as nip from mapel a inner join guru b on a.nip=b.nip";
    $query = mysqli_query($koneksi,$sql);
    while($edit = mysqli_fetch_array($query)){
?>
<div class="modal fade" id="edit<?= $edit['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Mapel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="manage_mapel.php" method="post">
                <input type="hidden" name="manage" value="ubah">
                <input type="hidden" name="id" value="<?= $edit['id'] ?>">
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Nama</label>
                    <input type="text"  name="nama" value="<?= $edit['nama_mapel'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Pilih Pengajar</label>
                    <select name="nip" id="select" class="form-control">
                        <?php 
                            $length = count($pengajar);
                            for($i=0;$i<$length;$i++){
                        ?>
                        <option <?php if($pengajar[$i]['nip'] == $edit['nip']){echo 'selected="selected"';} ?>  value="<?= $pengajar[$i]['nip'] ?>"> <?= $pengajar[$i]['nama'] ?></option>
                        <?php } ?>
                    </select>
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
    <!-- hapus mapel --->
    <?php
    $sql="select * from mapel";
    $query = mysqli_query($koneksi,$sql);
    while($hapus = mysqli_fetch_array($query)){
    ?>
        <div class="modal fade" id="hapus<?= $hapus['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Murid</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apa Anda Yakin Ingin Menghapus Mata Pelajaran <b><?= $hapus['nama']?></b> ?
            </div>
            <div class="modal-footer">
                <form action="manage_mapel.php" method="post">
                <input type="hidden" name="manage" value="hapus">
                <input type="hidden" name="id" value="<?= $hapus['id']?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Iya</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php } ?>


<?php include('../template/footer.php'); ?>