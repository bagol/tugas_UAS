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
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Pengajar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('koneksi.php');
                session_start();
                $kelas = $_SESSION['kelas'];
                $no=1;
                $sql="select hari, jam_mulai, jam_selesai, c.nama as nama_guru, b.nama AS nama_mapel from jadwal a inner join mapel b on a.id_mapel=b.id INNER JOIN guru c on b.nip=c.nip where a.kelas='7B' ";
                $query = mysqli_query($koneksi,$sql);
                
                while($hasil = mysqli_fetch_array($query)){ ?>
                   <tr>
                        <td><?= $no; ?> </td>
                        <td><?= $hasil['hari']; ?> </td>
                        <td><?= $hasil['nama_mapel']; ?> </td>
                        <td><?= $hasil['jam_mulai']; ?> </td>
                        <td><?= $hasil['jam_selesai']; ?> </td>
                        <td><?= $hasil['nama_guru']; ?> </td>
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

    
