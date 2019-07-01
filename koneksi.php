<?php
//  author : Mulyadih
//  tugas  : UAS

$koneksi = mysqli_connect("localhost","root","","uas");

if(mysqli_connect_error($koneksi)){
    echo "koneksi gagal <b>".mysqli_connect_error($koneksi)."</b>";
}


?>