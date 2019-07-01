<?php
session_start();
    if($_SESSION['role'] == 'staff'){
        header("location:staff/staff.php");
    }else if($_SESSION['role'] == 'guru'){
        header("location:guru/guru.php");
    }else if($_SESSION['role'] == 'murid'){
        header("location:murid/murid.php");
    }else{
        header("location:index.php");
    }
?>