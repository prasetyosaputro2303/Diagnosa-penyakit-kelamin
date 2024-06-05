<?php
include "koneksi.php";

$pesan_error = "";
if (isset($_POST['tambah'])) {
    $id = $_POST['id_penyakit'];
    $id2 = $_POST['id_gejala'];

    $result2 = mysqli_query($db, "SELECT * FROM relasi WHERE id_gejala = '$id2' AND id_penyakit = '$id'");

    if ($result2 && mysqli_num_rows($result2) > 0) {
        $pesan_error = "Relasi Sudah Ada";
    } else {
        $result = mysqli_query($db, "INSERT INTO relasi (id_penyakit, id_gejala) VALUES ('$id', '$id2')");
        if ($result) {
            header("location: relasi.php");
            exit();
        } else {
            $pesan_error = "Error saat menyimpan data: " . mysqli_error($db);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Relasi</title>
    <link rel="stylesheet" href="style2.css" />
    <?php include "layout/header2.html" ?>
</head>

<div class="body">

    <body>
        <div class="container">
            <div class="content">
                <div class="header">
                    <h2>Tambah Relasi</h2>
                </div>
                <?php
                if ($pesan_error) {
                    echo "<div class='pesan'><p>" . $pesan_error . "</p></div>";
                }
                ?>
                <form action="tambahRelasi.php" method="POST">
                    <div class="form">
                        <label for="id_penyakit">Pilih Penyakit</label>
                        <select name="id_penyakit" id="id_penyakit">
                            <?php
                            $result = mysqli_query($db, "SELECT id_penyakit, penyakit FROM penyakit");
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value= " . $row['id_penyakit'] . ">" . $row['id_penyakit'] . "-" . $row['penyakit'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form">
                        <label for="id_gejala">Pilih Gejala</label>
                        <select name="id_gejala" id="id_gejala">
                            <?php
                            $result = mysqli_query($db, "SELECT id_gejala, gejala FROM gejala");
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value= " . $row['id_gejala'] . ">" . $row['id_gejala'] . "-" . $row['gejala'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="button">
                        <input type="submit" name="tambah" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </body>
</div>

</html>