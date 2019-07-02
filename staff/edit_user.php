<?php

include('../koneksi.php');
if($_POST['user']=='murid'){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT,['cons'=>10]);
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $notlpn = $_POST['notlpn'];
    $sql = "update murid set nama='$nama', password='$password', email='$email', alamat='$alamat', notlpn='$notlpn' where nis='$nis'";
    if(mysqli_query($koneksi,$sql)){
        header("location:tambah_murid.php?pesan=murid_added");
    }else{
        header("location:tambah_murid.php?pesan=faild_added");
    }
} else if($_POST['user']=='guru'){
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT,['cons'=>10]);
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $sql = "update guru set nama='$nama', password='$password', email='$email', alamat='$alamat' where nip='$nip'";
    if(mysqli_query($koneksi,$sql)){
        header("location:tambah_guru.php?pesan=guru_updated");
    }else{
        header("location:tambah_guru.php?pesan=faild_updated");
    }
}