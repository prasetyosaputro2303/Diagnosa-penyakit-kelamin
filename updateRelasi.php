<?php
include "koneksi.php";

$id_penyakit = "";
$id_gejala = "";
$id_relasi = "";
if (isset($_GET['id_relasi'])) {
    $id_relasi = $_GET['id_relasi'];
    $result = mysqli_query($db, "SELECT * FROM relasi WHERE id_relasi = $id_relasi");
    if ($row = mysqli_fetch_assoc($result)) {
        $id_penyakit = $row['id_penyakit'];
        $id_gejala = $row['id_gejala'];
    }
}

$pesan_error = "";
if (isset($_POST['update'])) {
    $id1 = $_POST['id_relasi'];
    $id2 = $_POST['id_penyakit'];
    $id3 = $_POST['id_gejala'];

    $result = mysqli_query($db, "UPDATE relasi SET id_penyakit = $id2, id_gejala = $id3 WHERE id_relasi = $id1");
    if ($result) {
        header("location: relasi.php");
        exit();
    } else {
        echo "gagal";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Relasi</title>
    <link rel="stylesheet" href="style2.css" />
    <?php include "layout/header2.html" ?>
</head>

<div class="body">
    <div class="container">
        <div class="content">
            <div class="header">
                <h2>Update Relasi</h2>
            </div>
            <form action="updateRelasi.php" method="POST">
                <div class="form">
                    <input type="hidden" name="id_relasi" value="<?php echo $id_relasi; ?>">
                    <label for="id_penyakit">Pilih Penyakit</label>
                    <select name="id_penyakit" id="id_penyakit" required>
                        <option value="" disable selected>Pilih Relasi</option>
                        <?php
                        $result = mysqli_query($db, "SELECT id_penyakit, penyakit FROM penyakit");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $selected = $row['id_penyakit'] == $id_penyakit ? 'selected' : '';
                                echo "<option value= '" . $row['id_penyakit'] . "' $selected>" . $row['id_penyakit'] . "-" . $row['penyakit'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form">
                    <label for="id_gejala">Pilih Gejala</label>
                    <select name="id_gejala" id="id_gejala" required>
                        <option value="" disable selected>Pilih Gejala</option>
                        <?php
                        $result = mysqli_query($db, "SELECT id_gejala, gejala FROM gejala");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $selected = $row['id_gejala'] == $id_gejala ? 'selected' : '';
                                echo "<option value= '" . $row['id_gejala'] . "' $selected>" . $row['id_gejala'] . "-" . $row['gejala'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="button">
                    <input type="submit" name="update" value="update">
                </div>
            </form>
        </div>
    </div>
</div>

<body>

</body>

</html>