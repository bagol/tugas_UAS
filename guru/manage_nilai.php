<?php
include('../koneksi.php');
$murid = $_POST['murid'];
$mapel = $_POST['mapel'];
$tugas = $_POST['tugas'];
$uts = $_POST['uts'];
$uas = $_POST['uas'];

if($_POST['manage']=='simpan'){
    $sql = "insert into nilai values('','$murid','$mapel','$tugas','$uts','$uas');";
    $query = mysqli_query($koneksi,$sql);
    if($query){
        header("location:input_nilai.php?nilai_added");
    }else{
        header("location:input_nilai.php?failed_added");
    }
}else if($_POST['manage']=='ubah'){
    $id = $_POST['id'];
    $sql = "update nilai set tugas='$tugas', uts='$uts', uas='$uas' where id='$id'";
    $query = mysqli_query($koneksi,$sql);
    if($query){
        header("location:input_nilai.php?nilai_updated");
    }else{
        header("location:input_nilai.php?failed_updated");
    }
}else if($_POST['manage']=='hapus'){
    $id = $_POST['id'];
    $sql = "delete from nilai where id='$id'";
    $query = mysqli_query($koneksi,$sql);
    if($query){
        header("location:input_nilai.php?nilai_deleted");
    }else{
        header("location:input_nilai.php?failed_deleted");
    }
}