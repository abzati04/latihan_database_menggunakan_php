<?php

$login_message = "";

if(isset($_POST['masuk'])){
    include "service/database.php";
    $username = $_POST['nama'];
    $password = $_POST['sandi'];

    $sql = "SELECT * FROM users WHERE 
    username='$username' AND password='$password'
    ";

    $result= $db->query($sql);

    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        header("location: dashboard.php");
    }
    else{
        $login_message = "upss akun tidak ditemukan";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>masuk</title>
</head>
<body>
    <?php include "layout/header.html" ?>

    <h3>MASUK AKUN</h3>
    <i><?= $login_message ?></i>
    <form action="login.php" method="POST">
        <input type="text" placeholder="nama atau email" name="nama"/>
        <input type="password" placeholder="sandi" name="sandi"/>
        <button type="submit" name="masuk">masuk sekarang</button>
    </form>

    <?php include "layout/footer.html" ?>
</body>
</html>
