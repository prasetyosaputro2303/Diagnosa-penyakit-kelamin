<?php
include "koneksi.php";


if (isset($_POST['delete'])) {
    $id_relasi = $_POST['id_relasi'];
    mysqli_query($db, "DELETE FROM relasi WHERE id_relasi = '$id_relasi'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relasi</title>
    <link rel="stylesheet" href="style_dashboard.css" />
    <?php include "layout/header2.html" ?>
</head>

<div class="body">

    <body>
        <div class="container">
            <table class="content">
                <tr>
                    <th>No</th>
                    <th>ID Penyakit</th>
                    <th>ID Gejala</th>
                    <th colspan="2">
                        <div class="icon">
                            <a href="tambahRelasi.php"><img src="add.png"></a>
                        </div>
                    </th>
                </tr>


                <?php
                $result = mysqli_query(
                    $db,
                    "SELECT penyakit.id_penyakit, penyakit.penyakit, gejala.id_gejala, gejala.gejala, relasi.id_relasi FROM relasi
            JOIN penyakit ON relasi.id_penyakit = penyakit.id_penyakit
            JOIN gejala ON relasi.id_gejala = gejala.id_gejala"
                );
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td align='center'>" . $no . "</td>";
                    echo "<td align='center'>" . $row['penyakit'] . "</td>";
                    echo "<td class='border'>" . $row['gejala'] . "</td>";
                    echo "<td>
                            <form action='relasi.php' method='POST' onsubmit='return confirm(\"yakin ingin menghapus?\")'>
                                <input type='hidden' name='id_relasi' value='" . $row['id_relasi'] . "'>
                                <button type='submit' name='delete'><img src='delete.png'></button>
                            </form>
                        </td>";
                    echo "<td>
                            <button><a href='updateRelasi.php?id_relasi= " . $row['id_relasi'] . "'><img src='update.png' class='update'></a></button>
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