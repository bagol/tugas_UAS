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
                        <th>Mata Pelajaran</th>
                        <th>Tugas</th>
                        <th>UTS</th>
                        <th>UAS</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'koneksi.php';

                $sql= "select * from nilai a left join mapel b on a.id_mapel=b.id";
                $ee = mysqli_query($koneksi,$sql);
                $no=1;
                while($hasil = mysqli_fetch_array($ee)){
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $hasil['nama'] ?></td>
                    <td><?= $hasil['tugas'] ?></td>
                    <td><?= $hasil['uts'] ?></td>
                    <td><?= $hasil['uas'] ?></td>
                </tr>
                <?php $no++;
                } ?>
                </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
<!-- footer --->
<?php include('../template/footer1.php'); ?>
<?php include('../template/footer.php'); ?>