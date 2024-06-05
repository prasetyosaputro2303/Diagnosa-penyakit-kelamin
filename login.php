<?php
include "koneksi.php";
session_start();

$pesan_error = "";
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hasil = $db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    if ($hasil->num_rows > 0) {
        $data = $hasil->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        $_SESSION["is_login"] = true;

        header("location: dashboard.php");
        exit();
    } else {
        $pesan_error = "Akun tidak ditemukan";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_login.css" />
    <title>Login</title>
    <!-- <?php include "layout/header.html" ?> -->
</head>

<body>
    <div class="container">
        <div class="content">
            <?php

            echo "<header>Login</header>";
            if ($pesan_error) {
                echo "<div class='pesan'><p>" . $pesan_error . "</p></div>";
            }
            echo "<form action='login.php' method='POST' class='form'>
                <div class='input'>
                    <label for='user'>Username</label>
                    <input type='text' name='username' id='user' required>
                </div>

                <div class='input'>
                    <label for='user'>Password</label>
                    <input type='password' name='password' required>
                </div>

                <div class='button'>
                    <input type='submit' name='login'>
                </div>
                </form>

                <div class='button2'>";
            echo "<a href='home.php'><button class='btn'>back</button></a>
                </div>";

            ?>

        </div>
    </div>

</body>

</html>