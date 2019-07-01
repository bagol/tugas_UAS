<?php
include('koneksi.php');
session_start();
$kelas = $_SESSION['kelas'];
echo $kelas;
$sql="select * from jadwal a inner join mapel b on a.id_mapel=b.id where a.kelas='$kelas'";
$query = mysqli_query($koneksi,$sql);
$hasil = mysqli_fetch_array($query);
    
