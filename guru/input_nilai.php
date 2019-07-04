<?php
    session_start();
    if($_SESSION['role'] !== 'guru'){
        header("location:../cek_session.php");  
    }
    include('../template/header.php');
?>

<div class="row">
    <div class="col-md-12">
        <!-- DATA TABLE -->
        <h3 class="title-5 m-b-35">Data Nilai Murid</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    
                </div>
                </div>
            <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#exampleModal">
                    <i class="zmdi zmdi-plus"></i>input Nilai Murid</button>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Murid</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Tugas</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../koneksi.php');

                    session_start();
                    $id = $_SESSION['nip'];
                    $no=1;
                    $sql="SELECT a.id as id, a.tugas as tugas, a.uts as uts, a.uas as uas, b.nama as mapel, c.no_kelas as kelas, d.nama as murid from nilai a join mapel b on a.id_mapel=b.id join kelas c on b.id_kelas=c.id join murid d on a.nis=d.nis where b.nip='$id' ";
                    $query = mysqli_query($koneksi,$sql);
                    if(mysqli_num_rows($query) > 0){
                        while($hasil = mysqli_fetch_array($query)){?>
                            <tr class="tr-shadow">
                                <td> <?= $no; ?> </td>
                                <td><?= $hasil['murid'];?></td>
                                <td><?= $hasil['mapel'];?></td>
                                <td><?= $hasil['kelas'];?></td>
                                <td><?= $hasil['tugas'];?></td>
                                <td><?= $hasil['uts'];?></td>
                                <td><?= $hasil['uas'];?></td>
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
                        <?php $no++; }} else{?>
                        <th colspan="8" class="text-center">Data Belum Di Input</th>
                        <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>


<!-- footer --->

<?php  include('../template/footer1.php'); ?>

<!-- Modal tambah nilai -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input Nilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="manage_nilai.php" method="post">
                <input type="hidden" name="manage" value="simpan">
                <div class="form-group">
                <label class=" form-control-label">NIS</label>
                    <select name="murid" id="select" class="form-control">
                        <?php 
                            $sql="SELECT DISTINCT c.nis as nis, c.nama as murid FROM kelas a join mapel b on a.id=b.id_kelas join murid c on a.id=c.id_kelas where b.nip='$id'";
                            $query = mysqli_query($koneksi,$sql);
                            while($murid = mysqli_fetch_array($query)){
                        ?>
                        <option value="<?= $murid['nis'] ?>"><?= $murid['murid'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                <label class=" form-control-label">Mata Pelajaran</label>
                    <select name="mapel" id="select" class="form-control">
                        <?php 
                            $sql="SELECT * FROM `mapel` WHERE nip='$id' ";
                            $query = mysqli_query($koneksi,$sql);
                            while($mapel = mysqli_fetch_array($query)){
                        ?>
                        <option value="<?= $mapel['id'] ?>"><?= $mapel['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Tugas</label>
                    <input type="number"  name="tugas" placeholder="Masukan Nilai Tugas" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">UTS</label>
                    <input type="number"  name="uts" placeholder="Masukan Nilai UTS" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">UAS</label>
                    <input type="number"  name="uas" placeholder="Masukan Nilai UAS" class="form-control">
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

<!-- Modal ubah nilai -->

<?php

    // membuat array data murid
    $sql="SELECT DISTINCT c.nis as nis, c.nama as murid FROM kelas a join mapel b on a.id=b.id_kelas join murid c on a.id=c.id_kelas where b.nip='$id'";
    $query = mysqli_query($koneksi,$sql);
    $data_murid = array();
    $noo=0;
    while($murid = mysqli_fetch_array($query)){
        $data_murid[$noo++]= array('nis'=>$murid['nis'],'nama'=>$murid['murid']);
    }
    $murid_length= count($data_murid);

    // membuat array data mapel
    $sql="SELECT * FROM `mapel` WHERE nip='$id' ";
    $query = mysqli_query($koneksi,$sql);
    $data_mapel = array();
    $n0=0;
    while($mapel = mysqli_fetch_array($query)){
        $data_mapel[$n0++] = array('id'=> $mapel['id'], 'nama' => $mapel['nama']);
    }
    $mapel_length=count($data_mapel);

    // perulangan modal
    $sql="SELECT a.id as id, a.tugas as tugas, a.uts as uts, a.uas as uas, b.nama as mapel, c.no_kelas as kelas, d.nama as murid from nilai a join mapel b on a.id_mapel=b.id join kelas c on b.id_kelas=c.id join murid d on a.nis=d.nis where b.nip='$id' ";
    $query = mysqli_query($koneksi,$sql);
    while($edit = mysqli_fetch_array($query)){?>
?>

<div class="modal fade" id="edit<?= $edit['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Nilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="manage_nilai.php" method="post">
                <input type="hidden" name="manage" value="ubah">
                <div class="form-group">
                <label class=" form-control-label">NIS</label>
                    <select name="murid" id="select" class="form-control">
                        <?php 
                            for($i=0;$i<$murid_length;$i++){
                        ?>
                        <option <?= $eidt['murid']==$data_murid[$i]['nama'] ? 'selected="selected"' : '';?> value="<?= $data_murid[$i]['nis'] ?>"><?= $data_murid[$i]['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                <label class=" form-control-label">Mata Pelajaran</label>
                    <select name="mapel" id="select" class="form-control">
                        <?php 
                            for($i=0;$i<$mapel_length;$i++){
                        ?>
                        <option <?= $eidt['mapel']==$data_mapel[$i]['nama'] ? 'selected="selected"' : '';?> value="<?= $data_mapel[$i]['id'] ?>"><?= $data_mapel[$i]['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">Tugas</label>
                    <input type="number"  name="tugas" value="<?= $edit['tugas'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">UTS</label>
                    <input type="number"  name="uts" value="<?= $edit['uts'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-email" class=" form-control-label">UAS</label>
                    <input type="number"  name="uas" value="<?= $edit['uas'] ?>" class="form-control">
                </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="<?= $edit['id'] ?>">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Ubah">
        </form>
        </div>
        </div>
    </div>
    </div>
     <?php } ?>

<!-- modahapusl --->
<?php
     // perulangan modal
    $sql="SELECT a.id as id, a.tugas as tugas, a.uts as uts, a.uas as uas, b.nama as mapel, c.no_kelas as kelas, d.nama as murid from nilai a join mapel b on a.id_mapel=b.id join kelas c on b.id_kelas=c.id join murid d on a.nis=d.nis where b.nip='$id' ";
    $query = mysqli_query($koneksi,$sql);
    while($hapus = mysqli_fetch_array($query)){?>
?>

<div class="modal fade" id="hapus<?= $hapus['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Nilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="manage_nilai.php" method="post">
                apa anda yakin ingin menghapus nilai <?= $hapus['murid']?> ?
        </div>
        <div class="modal-footer">
            <input type="hidden" name="manage" value="hapus">
            <input type="hidden" name="id" value="<?= $hapus['id'] ?>">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" value="Hapus">
        </form>
        </div>
        </div>
    </div>
    </div>
     <?php } ?>

<?php  include('../template/footer.php'); ?>