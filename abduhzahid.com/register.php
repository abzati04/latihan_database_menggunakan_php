<?php
include "service/database.php";
$register_message= "";
if(isset($_POST["daftar"])){
    $username = $_POST["nama"];
    $password = $_POST["sandi"];

    $sql = "INSERT INTO users (username, password) VALUES('$username', '$password')";

    if($db->query($sql)){
        $register_message= "anda telah teregistrasi, silahkan masuk";
        header("location: login.php");
    }
    else{
        $register_message= "anda gagal registrasi, silahkan coba lagi";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>masuk</title>
    <style>
        body {
            background:#fff;
        }
    </style>
</head>
<body>
    <?php include "layout/header.html" ?>

    <h3>DAFTAR AKUN</h3>
    <i><?= $register_message; ?></i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="nama atau email" name="nama"/>
        <input type="password" placeholder="sandi" name="sandi"/>
        <button type="submit" name="daftar">daftar</button>
    </form>

    <?php include "layout/footer.html" ?>
</body>
</html>