<?php
    session_start();
    if($_SESSION['role'] !== 'staff'){
        header("location:../cek_session.php");  
    }
    include('../template/header.php');
?>
<h1>Selamat Datang <b><?=$_SESSION['nama']?></b> (<?= $_SESSION['role'];?>)</h1> 

<!-- footer --->
<?php include('../template/footer.php'); ?>

