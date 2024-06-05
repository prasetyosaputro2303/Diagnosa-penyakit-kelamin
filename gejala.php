<?php
include "koneksi.php";


if (isset($_POST['delete'])) {
    $id_gejala = $_POST['id_gejala'];
    mysqli_query($db, "DELETE FROM relasi WHERE id_gejala = '$id_gejala'");
    mysqli_query($db, "DELETE FROM gejala WHERE id_gejala = '$id_gejala'");
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
                    <th>Data Gejala</th>
                    <th colspan="2">
                        <div class="icon">
                            <a href="tambahGejala.php"><img src="add.png"></a>
                        </div>
                    </th>
                </tr>

                <?php
                $result = mysqli_query($db, "SELECT * FROM gejala");
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['gejala'] . "</td>";
                    echo "<td>
                            <form action='dashboard.php' method='POST' onsubmit='return confirm(\"yakin ingin menghapus?\")'>
                                <input type='hidden' name='id_gejala' value='" . $row['id_gejala'] . "'>
                                <button type='submit' name='delete'><img src='delete.png'></button>
                            </form>
                        </td>";

                    echo "<td>
                            <button><a href='updateGejala.php?id_gejala= " . $row['id_gejala'] . "'><img src='update.png' class='update'></a></button>
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