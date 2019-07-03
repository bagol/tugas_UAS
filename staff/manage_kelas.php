<?php
include('../koneksi.php');
if($_POST['manage']=='simpan'){
    $no = $_POST['no_kelas'];
    $sql = "insert into kelas values('','$no');";
    if(mysqli_query($koneksi,$sql)){
        header("location:tambah_kelas.php?kelas_added");
    }else{
        header("location:tambah_kelas.php?failed_add");
    }
}else if ($_POST['manage']=='ubah'){
    $no = $_POST['no_kelas'];
    $id = $_POST['id'];
    $sql = "update kelas set no_kelas='$no' where id='$id'";
    if(mysqli_query($koneksi,$sql)){
        header("location:tambah_kelas.php?kelas_updated");
    }else{
        header("location:tambah_kelas.php?failed_updated");
    }
}else if ($_POST['manage']=='hapus'){
    $id = $_POST['id'];
    $sql = "delete from kelas  where id='$id'";
    if(mysqli_query($koneksi,$sql)){
        header("location:tambah_kelas.php?kelas_deleted");
    }else{
        header("location:tambah_kelas.php?failed_deleted");
    }
}