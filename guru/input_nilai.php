<?php
    session_start();
    if($_SESSION['role'] !== 'guru'){
        header("location:../cek_session.php");  
    }
    include('../template/header.php');
?>




<!-- footer --->

<?php  include('../template/footer1.php'); ?>

<?php  include('../template/footer.php'); ?>