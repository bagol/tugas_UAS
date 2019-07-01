<?php
session_start();
if($_SESSION['role'] == 'staff'){
    header("location:cek_session.php");
}else if($_SESSION['role'] == 'murid'){
    header("location:cek_session.php");
}else if($_SESSION['role'] == 'guru'){
    header("location:cek_session.php");
}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <form action="login.php" method="post" autocomplete="off">
        <input type="text" name="nis" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" ><br>
        <input type="password" name="password"><br>
        <input type="submit" value="login">
    </form>
    
</body>
</html>
<?php
}
?>
<!-- end document-->