<?php
include('../koneksi.php');
$nis= $_POST['nis'];
$sql="delete from murid where nis='$nis'";
mysqli_query($koneksi,$sql);
header("location:tambah_murid.php?pesan=murid_deleted");
?>