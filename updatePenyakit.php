<?php
include "koneksi.php";

$id_penyakit = "";
$penyakit = "";
$desc = "";
if (isset($_GET['id_penyakit'])) {
    $id_penyakit = $_GET['id_penyakit'];
    $result = mysqli_query($db, "SELECT * FROM penyakit WHERE id_penyakit = $id_penyakit");
    if ($row = mysqli_fetch_assoc($result)) {
        $id_penyakit = $row['id_penyakit'];
        $penyakit = $row['penyakit'];
        $desc = $row['deskripsi'];
    }
}

$pesan_error = "";
if (isset($_POST['update'])) {
    $id = $_POST['id_penyakit'];
    $update = $_POST['penyakit'];
    $desc = $_POST['desc'];

    $result = mysqli_query($db, "UPDATE penyakit SET penyakit = '$update', deskripsi ='$desc' WHERE id_penyakit = $id");
    if ($result) {
        header("location: penyakit.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Penyakit</title>
    <link rel="stylesheet" href="style2.css" />
    <?php include "layout/header2.html" ?>
</head>

<div class="body">
    <div class="container">
        <div class="content">

            <body>
                <div class="header">
                    <h2>Update Penyakit</h2>
                </div>
                <form action="updatePenyakit.php" method="POST">
                    <div class="form">
                        <input type="hidden" name="id_penyakit" value="<?php echo $id_penyakit; ?>">
                        <label for="id_penyakit">Pilih Penyakit</label>
                        <select name="id_penyakit" id="id_penyakti">
                            <?php
                            $result = mysqli_query($db, "SELECT id_penyakit, penyakit, deskripsi FROM penyakit");
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $selected = $row['id_penyakit'] == $id_penyakit ? 'selected' : '';
                                    echo "<option value= '" . $row['id_penyakit'] . "' $selected>" . $row['penyakit'] . "</option>";
                                }
                            }

                            echo "<td>
                            <button><a href='updateGejala.php?id_gejala= " . $row['id_gejala'] . "'><img src='update.png' class='update'></a></button>
                        </td>";
                            ?>
                        </select>
                    </div>

                    <div class="form">
                        <label for="gejala">Ubah Penyakit</label>
                        <input type="text" name="penyakit" id="id_penyakit" value="<?php echo $penyakit ?>" required>
                    </div>

                    <div class="form">
                        <label for="desc">Deskripsi</label>
                        <input class="desc" type="text" name="desc" id="desc" value="<?php echo $desc ?>" required>
                    </div>

                    <div class="button">
                        <input type="submit" name="update" value="update">
                    </div>
                </form>
            </body>
        </div>
    </div>
</div>

</html>