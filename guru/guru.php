<?php
    session_start();
    if($_SESSION['role'] !== 'guru'){
        header("location:../cek_session.php");  
    }
    include('../template/header.php');
?>
<h1>Selamat Datang <b><?=$_SESSION['nama']?></b> (<?= $_SESSION['role'];?>) </h1> 
<br>


<!-- footer --->

<?php  include('../template/footer1.php'); ?>

<?php  include('../template/footer.php'); ?>