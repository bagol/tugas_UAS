<?php
include('../koneksi.php');
if($_POST['user']=='murid'){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT,['cons'=>10]);
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $notlpn = $_POST['notlpn'];
    $kelas = $_POST['id_kelas'];
    // echo $_POST['user'].' '.$nis.'<br>'.$nama.'<br>'.$password.'<br>'.$email.'<br>'.$alamat.'<br>'.$notlpn.'<br>'.$kelas.'<br>';
    // die;
    $sql = "INSERT INTO murid values('$nis','$nama','$password','$alamat','$email','$notlpn','$kelas');";
    
    if(mysqli_query($koneksi,$sql)){
        header("location:tambah_murid.php?pesan=data_added");
    }else{
        header("location:tambah_murid.php?pesan=faild_added");
    }
} else if($_POST['user']=='guru'){
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT,['cons'=>10]);
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $sql = "INSERT INTO guru values('$nip','$nama','$email','$alamat','$password');";
    if(mysqli_query($koneksi,$sql)){
        header("location:tambah_guru.php?pesan=data_added");
    }else{
        header("location:tambah_guru.php?pesan=faild_added");
    }
}
?>