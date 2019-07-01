<?php
 include('koneksi.php');
 if($_POST['user'] == 'murid'){
    $nis =$_POST['nis'];
    $nama =$_POST['nama'];
    $password =password_hash($_POST['password'],PASSWORD_DEFAULT,['cons' => 10]);
    $alamat =$_POST['alamat'];
    $email =$_POST['email'];
    $notlpn =$_POST['notlpn'];
    $sql= "insert into murid values('$nis','$nama','$password','$alamat','$email','$notlpn')";
    mysqli_query($koneksi,$sql);
    header("location:tambah_user.php?pesan=add_murid");
 }else if($_POST['user'] == 'guru'){
    $nis =$_POST['nip'];
    $nama =$_POST['nama'];
    $password =password_hash($_POST['password'],PASSWORD_DEFAULT,['cons' => 10]);
    $alamat =$_POST['alamat'];
    $email =$_POST['email'];
    $sql= "insert into murid values('$nis','$nama','$email','$alamat','$password')";
    mysqli_query($koneksi,$sql);
    header("location:tambah_user.php?pesan=add_guru");
 }