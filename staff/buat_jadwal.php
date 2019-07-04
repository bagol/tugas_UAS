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
        <h3 class="title-5 m-b-35">Data Jadwal</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    
                </div>
                </div>
            <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#exampleModal">
                    <i class="zmdi zmdi-plus"></i>Buat Jadwal</button>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Nama pengajar</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../koneksi.php');

                    $no=1;
                    $sql="SELECT a.hari as hari, a.jam_mulai as mulai, a.jam_selesai as selesai, a.id as id, b.no_kelas as kelas, c.nama as mapel, d.nama as pengajar FROM jadwal a inner join kelas b on a.id_kelas = b.id inner join mapel c on a.id_mapel=c.id inner join guru d on c.nip=d.nip ";
                    $query = mysqli_query($koneksi,$sql);
                    while($hasil = mysqli_fetch_array($query)){
                    ?>
                    <tr class="tr-shadow">
                        <td> <?= $no; ?> </td>
                        <td><?= $hasil['kelas'];?></td>
                        <td><?= $hasil['mapel'];?></td>
                        <td ><?= $hasil['pengajar'];?></td>
                        <td><?= $hasil['hari'];?></span></td>
                        <td><?= $hasil['mulai'];?> - <?= $hasil['selesai'];?></td>
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





<!-- footer --->
<?php include('../template/footer1.php'); ?>

<!-- Modal tambah kelas -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="manage_jadwal.php" method="post">
                <input type="hidden" name="manage" value="simpan">
                <div class="form-group">
                <label for="nf-password" class=" form-control-label">Pilih Kelas</label>
                    <select name="kelas" id="select" class="form-control">
                        <?php $sql="select * from kelas";
                        $query = mysqli_query($koneksi,$sql);
                        while($kelas = mysqli_fetch_array($query)){ ?>
                        <option value="<?= $kelas['id'] ?>"><?= $kelas['no_kelas'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="nf-password" class=" form-control-label">Pilih Mata Pelajaran</label>
                    <select name="mapel" id="select" class="form-control">
                        <?php $sql="select * from mapel";
                        $query = mysqli_query($koneksi,$sql);
                        while($mapel = mysqli_fetch_array($query)){ ?>
                        <option value="<?= $mapel['id'] ?>"><?= $mapel['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="nf-password" class=" form-control-label">Pilih Mata Pelajaran</label>
                    <select name="hari" id="select" class="form-control">
                       <option value="Senin">Senin</option>
                       <option value="Selasa">Selasa</option>
                       <option value="Rabu">Rabu</option>
                       <option value="Kamis">Kamis</option>
                       <option value="Jum'at">Jum'at</option>
                       <option value="Sabtu">Sabtu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nf-jam" class=" form-control-label">Jam Mulai</label>
                    <input type="time"  name="mulai" placeholder="Pilih Jam" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-jam" class=" form-control-label">Jam Selesai</label>
                    <input type="time"  name="selesai" placeholder="Pilih Jam" class="form-control">
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

<!-- Modal ubah jadwal -->
<?php
$data_kelas = array();
$data_mapel = array();
$j = 0;
$i = 0;
$kelas_query = mysqli_query($koneksi,"select * from kelas");
while($kelas = mysqli_fetch_array($kelas_query)){
    $data_kelas[$i++] = array('id' => $kelas['id'], 'no_kelas' => $kelas['no_kelas']);
}
$mapel_query = mysqli_query($koneksi,"select * from mapel");
while($mapel = mysqli_fetch_array($mapel_query)){
    $data_mapel[$j++] = array('id' => $mapel['id'], 'nama' => $mapel['nama']);
}

$sql="SELECT a.hari as hari, a.jam_mulai as mulai, a.jam_selesai as selesai, a.id as id, b.no_kelas as kelas, c.nama as mapel, d.nama as pengajar FROM jadwal a inner join kelas b on a.id_kelas = b.id inner join mapel c on a.id_mapel=c.id inner join guru d on c.nip=d.nip ";
$query = mysqli_query($koneksi,$sql);
while($edit = mysqli_fetch_array($query)){?>
<div class="modal fade" id="edit<?=$edit['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Jadwal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="manage_jadwal.php" method="post">
                <input type="hidden" name="manage" value="ubah">
                <input type="hidden" name="id" value="<?= $edit['id'] ?>">
                <div class="form-group">
                <label for="nf-password" class=" form-control-label">Pilih Kelas</label>
                    <select name="kelas" id="select" class="form-control">
                        <?php
                            $length_kelas= count($data_kelas);
                            for($i=0;$i<$length_kelas;$i++){
                        ?>
                        <option <?php echo $edit['kelas']==$data_mapel[$i]['no_kelas'] ? 'selected="selected"' : ''; ?> value="<?= $data_kelas[$i]['id'] ?>"><?= $data_kelas[$i]['no_kelas'] ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="nf-password" class=" form-control-label">Pilih Mata Pelajaran</label>
                    <select name="mapel" id="select" class="form-control">
                        <?php
                            $length_mapel= count($data_mapel);
                            for($i=0;$i<$length_mapel;$i++){
                        ?>
                        <option <?php echo $edit['mapel']==$data_mapel[$i]['nama'] ? 'selected="selected"' : ''; ?> value="<?= $data_mapel[$i]['id'] ?>"><?= $data_mapel[$i]['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="nf-password" class=" form-control-label">Pilih Mata Pelajaran</label>
                    <select name="hari" id="select" class="form-control">
                       <option <?php echo $edit['hari']=='Senin' ? 'selected="selected' : ''; ?> value="Senin">Senin</option>
                       <option <?php echo $edit['hari']=='Selasa' ? 'selected="selected' : ''; ?> value="Selasa">Selasa</option>
                       <option <?php echo $edit['hari']=='Rabu' ? 'selected="selected' : ''; ?> value="Rabu">Rabu</option>
                       <option <?php echo $edit['hari']=='Kamis' ? 'selected="selected' : ''; ?> value="Kamis">Kamis</option>
                       <option <?php echo $edit['hari']=="jum'at" ? 'selected="selected' : ''; ?> value="Jum'at">Jum'at</option>
                       <option <?php echo $edit['hari']=='Sabtu' ? 'selected="selected' : ''; ?> value="Sabtu">Sabtu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nf-jam" class=" form-control-label">Jam Mulai</label>
                    <input type="time"  name="mulai" value="<?= $edit['mulai'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nf-jam" class=" form-control-label">Jam Selesai</label>
                    <input type="time"  name="selesai" value="<?= $edit['selsai'] ?>" placeholder="Pilih Jam" class="form-control">
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
    $sql="select a.id as id, b.nama as mapel from jadwal a join mapel b on a.id_mapel=b.id ";
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
                Apa Anda Yakin Ingin Menghapus jadwal Pelajaran <b><?= $hapus['mapel']?></b> ?
            </div>
            <div class="modal-footer">
                <form action="manage_jadwal.php" method="post">
                <input type="hidden" name="manage" value="hapus">
                <input type="hidden" name="id" value="<?=$hapus['id']?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Iya</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php } ?>



<?php include('../template/footer.php'); ?>