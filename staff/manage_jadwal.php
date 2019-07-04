<?php

include('../koneksi.php');

$kelas =$_POST['kelas'];
$mapel =$_POST['mapel'];
$hari =$_POST['hari'];
$mulai =$_POST['mulai'];
$selesai =$_POST['selesai'];

// echo $kelas.'<br>'.$mapel.'<br>'.$hari.'<br>'.$mulai.'<br>'.$selesai;
if($_POST['manage']=='simpan'){
    $sql="insert into jadwal values('','$kelas','$mapel','$hari','$mulai','$selesai');";
    if(mysqli_query($koneksi,$sql)){
        header("location:buat_jadwal.php?pesan=jadwal_added");
    }else{
        header("location:buat_jadwal.php?pesan=failed_added");
    }
}else if($_POST['manage']=='ubah'){
    $id = $_POST['id'];
    $sql = "update jadwal set id_kelas='$kelas', id_mapel='$mapel', hari='$hari', jam_mulai='$mulai', jam_selesai='$selesai' where id='$id'";
    if(mysqli_query($koneksi,$sql)){
        header("location:buat_jadwal.php?pesan=jadwal_updated");
    }else{
        header("location:buat_jadwal.php?pesan=failed_updated");
    }
}else if($_POST['manage']=='hapus'){
    $id = $_POST['id'];
    $sql = "delete from jadwal where id='$id'";
    if(mysqli_query($koneksi,$sql)){
        header("location:buat_jadwal.php?pesan=jadwal_deleted");
    }else{
        header("location:buat_jadwal.php?pesan=failed_deleted");
    }
}