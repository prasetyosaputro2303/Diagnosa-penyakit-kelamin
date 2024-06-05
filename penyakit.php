<?php
include "koneksi.php";

if (isset($_POST['delete'])) {
    $id_penyakit = $_POST['id_penyakit'];
    mysqli_query($db, "DELETE FROM relasi WHERE id_penyakit = '$id_penyakit'");
    mysqli_query($db, "DELETE FROM penyakit WHERE id_penyakit = '$id_penyakit'");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style_dashboard.css" />
    <?php include "layout/header2.html" ?>
</head>

<div class="body">

    <body>
        <div class="container">
            <table class="content">
                <tr>
                    <th>No</th>
                    <th>Nama Penyakit</th>
                    <th>Deskripsi</th>
                    <th colspan="2">
                        <div class="icon">
                            <a href="tambahPenyakit.php"><img src="add.png"></a>
                        </div>
                    </th>
                </tr>


                <?php
                $result = mysqli_query($db, "SELECT * FROM penyakit");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['penyakit'] . "</td>";
                    echo "<td class='desc'>" . $row['deskripsi'] . "</td>";
                    echo "<td>
                <form action='penyakit.php' method='POST' onsubmit='return confirm(\"yakin ingin menghapus?\")'>
                    <input type='hidden' name='id_penyakit' value='" . $row['id_penyakit'] . "'>
                    <button type='submit' name='delete'><img src='delete.png'></button>
                </form>
                </td>";

                    echo "<td>
                            <button><a href='updatePenyakit.php?id_penyakit= " . $row['id_penyakit'] . "'><img src='update.png' class='update'></a></button>
                        </td>";
                    echo "</tr>";

                    $no++;
                }
                ?>
            </table>
        </div>

    </body>
</div>


</html>