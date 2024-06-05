<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah gejala</title>
    <link rel="stylesheet" href="style2.css" />
    <?php include "layout/header2.html" ?>
</head>

<div class="body">

    <body>
        <div class="container">
            <div class="content">
                <h2>Tambah Gejala</h2>
                <form action="tambahGejala.php" method="POST">
                    <div class="form">
                        <label for="gejala">Masukkan Nama Gejala</label>
                        <input type="text" name="gejala" required>
                    </div>
                    <div class="button">
                        <input type="submit" class="btn2" name="answer" value="submit">
                    </div>
                </form>
            </div>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer'])) {
            $gejala = $db->real_escape_string($_POST['gejala']);
            $result = mysqli_query($db, "INSERT INTO gejala (gejala) VALUES ('$gejala')");

            if ($result == true) {
                header("location: gejala.php");
            } else {
                echo "gagal";
            }
        }
        mysqli_close($db);
        ?>
    </body>
</div>


</html>