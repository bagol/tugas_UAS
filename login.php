<?php
//  author : Mulyadih
//  tugas  : UAs
session_start();
$id = $_POST['id'];
$pass =$_POST['password'];

include 'koneksi.php';

$murid = "select * from murid a inner join kelas b on a.nis=b.nis  where a.nis='$id' ";
$guru = "select * from guru where nip='$id'";
$staff = "select * from staff where nip='$id'";
if(mysqli_num_rows(mysqli_query($koneksi,$murid)) > 0){
    $hasil = mysqli_fetch_array(mysqli_query($koneksi,$murid));
    if(password_verify($pass,$hasil['password'])){
        $_SESSION['nis'] = $hasil['nis'];
        $_SESSION['nama'] = $hasil['nama'];
        $_SESSION['email'] = $hasil['email'];
        $_SESSION['role'] = 'murid';
        $_SESSION['kelas'] = $hasil['no_kelas'];
        header("location:cek_session.php");
    }else{
        header("location:index.php?pesan=salah_pass");
    }
}else if(mysqli_num_rows(mysqli_query($koneksi,$guru)) > 0){
    $hasil = mysqli_fetch_array(mysqli_query($koneksi,$guru));
        if(password_verify($pass,$hasil['password'])){
    $_SESSION['nip'] = $hasil['nip'];
        $_SESSION['nama'] = $hasil['nama'];
        $_SESSION['email'] = $hasil['email'];
        $_SESSION['role'] = 'guru';
        header("location:cek_session.php");
    }else{
        header("location:index.php?pesan=salah_pass");
    }
}else if(mysqli_num_rows(mysqli_query($koneksi,$staff)) > 0){
    $hasil = mysqli_fetch_array(mysqli_query($koneksi,$staff));
    if(password_verify($pass,$hasil['password'])){
        $_SESSION['nip'] = $hasil['nip'];
        $_SESSION['nama'] = $hasil['nama'];
        $_SESSION['email'] = $hasil['email'];
        $_SESSION['role'] = 'staff';
        header("location:cek_session.php");
    }else{
        header("location:index.php?pesan=salah_pass");
    }
} else {
    header("location:index.php?pesan=invalid_user");
}

?>