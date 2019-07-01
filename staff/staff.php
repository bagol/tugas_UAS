<?php
    session_start();
    if($_SESSION['role'] !== 'staff'){
        header("location:../cek_session.php");
    }
?>
<h1>Selamat Datang <b><?=$_SESSION['nama']?></b> (<?= $_SESSION['role'];?>)</h1> 
<br>
<a href="../logout.php">Logout</a>