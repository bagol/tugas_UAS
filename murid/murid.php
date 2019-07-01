<?php
    session_start();
    if($_SESSION['role'] !== 'murid'){
        header("location:../cek_session.php");  
    }
?>
<h1>Selamat Datang <b><?=$_SESSION['nama']?></b> (<?= $_SESSION['role'];?>)  <small><?= $_SESSION['kelas']; ?></small></h1> 
<br>
<a href="../logout.php">Logout</a>