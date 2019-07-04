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
        <h3 class="title-5 m-b-35">Data Kelas</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
                <div class="rs-select2--light rs-select2--md">
                    
                </div>
                <div class="rs-select2--light rs-select2--sm">
                    
                </div>
                </div>
            <div class="table-data__tool-right">
                
            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../koneksi.php');
                    session_start();
                    $nip = $_SESSION['nip'];
                    $no=1;
                    $sql="SELECT a.hari as hari, a.jam_mulai as mulai, a.jam_selesai as selesai, b.nama as mapel, c.no_kelas as kelas FROM jadwal a INNER JOIN mapel b on a.id_mapel=b.id inner join kelas c on a.id_kelas=c.id WHERE b.nip='$nip' ";
                    $query = mysqli_query($koneksi,$sql);
                    while($hasil = mysqli_fetch_array($query)){
                    ?>
                    <tr class="tr-shadow">
                        <td> <?= $no; ?> </td>
                        <td><?= $hasil['hari'];?></td>
                        <td><?= $hasil['mapel'];?></td>
                        <td><?= $hasil['kelas'];?></td>
                        <td><?= $hasil['mulai'];?> - <?= $hasil['selesai'];?></td>
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

<?php  include('../template/footer1.php'); ?>

<?php  include('../template/footer.php'); ?>