<?php
    session_start();
    if($_SESSION['role'] !== 'murid'){
        header("location:../cek_session.php");  
    }
    include('../template/header.php');
?>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Mata Pelajaran</th>
                        <th>Jam </th>
                        <th>Pengajar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('koneksi.php');
                session_start();
                $kelas = $_SESSION['kelas'];
                $no=1;
                $sql="SELECT a.hari as hari, a.jam_mulai as mulai, a.jam_selesai as selesai, c.nama as pengajar, b.nama as mapel from jadwal a inner JOIN mapel b on a.id_mapel=b.id INNER JOIN guru c on b.nip= c.nip inner join kelas d on a.id_kelas=d.id where d.id='$kelas'";
                $query = mysqli_query($koneksi,$sql);
                
                while($hasil = mysqli_fetch_array($query)){ ?>
                   <tr>
                        <td><?= $no; ?> </td>
                        <td><?= $hasil['hari']; ?> </td>
                        <td><?= $hasil['mapel']; ?> </td>
                        <td><?= $hasil['mulai']; ?> - <?= $hasil['selesai']; ?></td>
                        <td><?= $hasil['pengajar']; ?> </td>
                   </tr>
                <?php $no++; } ?>
                
                </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>


<!-- footer --->
<?php include('../template/footer1.php'); ?>
<?php include('../template/footer.php'); ?>

    
