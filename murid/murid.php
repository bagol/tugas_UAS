<?php
    session_start();
    if($_SESSION['role'] !== 'murid'){
        header("location:../cek_session.php");  
    }
    include('../template/header.php');
?>

<H1>SELAMAT DATANG <?= $_SESSION['nama'] ?></H1>


<!-- footer --->
<?php include('../template/footer1.php'); ?>
<?php include('../template/footer.php'); ?>