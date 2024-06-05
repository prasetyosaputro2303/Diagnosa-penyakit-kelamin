<?php
include "koneksi.php";

$pesan_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer'])) {
    $penyakit = $db->real_escape_string($_POST['penyakit']);
    $desc = $db->real_escape_string($_POST['desc']);

    $result2 = mysqli_query($db, "SELECT * FROM penyakit WHERE penyakit = '$penyakit'");
    if ($result2 && mysqli_num_rows($result2) > 0) {
        $pesan_error = "Penyakit Sudah Ada";
    } else {
        $result = mysqli_query($db, "INSERT INTO penyakit (penyakit, deskripsi) VALUES ('$penyakit', '$desc')");
        if ($result2) {
            header("location: penyakit.php");
            exit();
        } else {
            $pesan_error = "Error saat menyimpan data: " . mysqli_error($db);
        }
    }
}
mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penyakit</title>
    <link rel="stylesheet" href="style2.css" />
    <?php include "layout/header2.html" ?>
</head>

<div class="body">

    <body>
        <div class="container">
            <div class="content">
                <div class="header">
                    <h2>Tambah Penyakit</h2>
                </div>
                <?php
                if ($pesan_error) {
                    echo "<div class='pesan'><p>" . $pesan_error . "</p></div>";
                }
                ?>
                <form action="tambahPenyakit.php" method="POST">
                    <div class="form">
                        <label for="penyakit">Masukkan Nama Penyakit</label>
                        <input type="text" name="penyakit" required>
                    </div>

                    <div class="form">
                        <label for="desc">Masukkan Deskripsi</label>
                        <input type="text" name="desc" required>
                    </div>

                    <div class="button">
                        <input type="submit" class="btn2" name="answer" value="submit">
                    </div>
                </form>


            </div>
        </div>
    </body>
</div>

</html>