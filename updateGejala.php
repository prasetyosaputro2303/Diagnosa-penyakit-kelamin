<?php
include "koneksi.php";

$id_gejala = "";
$gejala = "";
if (isset($_GET['id_gejala'])) {
    $id_gejala = $_GET['id_gejala'];
    $result = mysqli_query($db, "SELECT * FROM gejala WHERE id_gejala = $id_gejala");
    if ($row = mysqli_fetch_assoc($result)) {
        $id_gejala = $row['id_gejala'];
        $gejala = $row['gejala'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id_gejala'];
    $update = $_POST['gejala'];

    $result = mysqli_query($db, "UPDATE gejala SET gejala = '$update' WHERE id_gejala = $id");

    if ($result == true) {
        header("location: gejala.php");
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
    <title>Update Gejala</title>
    <?php include "layout/header2.html" ?>
    <link rel="stylesheet" href="style2.css" />
</head>

<div class="body">

    <body>
        <div class="container">
            <div class="content">
                <h2>Update Gejala</h2>
                <form action="updateGejala.php" method="POST">
                    <div class="form">
                        <input type="hidden" name="id_gejala" value="<?php echo $id_gejala; ?>">
                        <label for="id_gejala">Pilih Gejala</label>
                        <select name="id_gejala" id="id_gejala">
                            <option value="" disable selected>Pilih Gejala</option>
                            <?php
                            $result2 = mysqli_query($db, "SELECT id_gejala, gejala FROM gejala");
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row = mysqli_fetch_assoc($result2)) {
                                    $selected = $row['id_gejala'] == $id_gejala ? 'selected' : '';
                                    echo "<option value= '" . $row['id_gejala'] . "' $selected>" . $row['id_gejala'] . "-" . $row['gejala'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form">
                        <label for="gejala">Nama Gejala</label>
                        <input type="text" name="gejala" id="gejala" value="<?php echo $gejala ?>" required>
                    </div>

                    <div class="button">
                        <input type="submit" name="update" value="update">
                    </div>
                </form>
            </div>
        </div>
    </body>
</div>

</html>