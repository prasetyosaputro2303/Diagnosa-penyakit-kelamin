<?php
include "function.php";
session_start();


if (isset($_SESSION["is_login"])) {
    header("location: dashhboard.php");
}

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

    if ($db->query($sql)) {
        echo "data masuk";
    } else {
        echo "data tidak masuk";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php include "layout/header.html" ?>
    <h3>Daftar Akun</h3>
    <form action="register.php" method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" placeholder="username" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" placeholder="password" name="password"></td>
            </tr>
            <tr>
                <td><button type="submit" name="register">Register</button></td>
            </tr>
        </table>
    </form>
</body>

</html>