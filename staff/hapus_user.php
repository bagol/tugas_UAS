<?php
include('../koneksi.php');
if($_POST['user']=='murid'){
$nis= $_POST['nis'];
$sql="delete from murid where nis='$nis'";
mysqli_query($koneksi,$sql);
header("location:tambah_murid.php?pesan=murid_deleted");
}else if($_POST['user']=='guru'){
$nip= $_POST['nip'];
$sql="delete from guru where nip='$nip'";
mysqli_query($koneksi,$sql);
header("location:tambah_guru.php?pesan=guru_deleted");
}
?>