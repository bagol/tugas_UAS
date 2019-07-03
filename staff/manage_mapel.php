<?php

include('../koneksi.php');
if($_POST['manage']=='simpan'){
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $sql="insert into mapel values('','$nama','$nip');";
    if(mysqli_query($koneksi,$sql)){
        header("location:tambah_mapel.php?pesan=mapel_added");
    }else{
        header("location:tambah_mapel.php?pesan=field_added");
    }
} else if($_POST['manage']=='ubah'){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $sql="update mapel set nama='$nama', nip='$nip' where id='$id'";
    if(mysqli_query($koneksi,$sql)){
        header("location:tambah_mapel.php?pesan=mapel_updated");
    }else{
        header("location:tambah_mapel.php?pesan=field_updated");
    }
} else if($_POST['manage']=='hapus'){
    $id = $_POST['id'];
    $sql="delete from mapel where id='$id'";
    if(mysqli_query($koneksi,$sql)){
        header("location:tambah_mapel.php?pesan=mapel_deleted");
    }else{
        header("location:tambah_mapel.php?pesan=field_deleted");
    }
}