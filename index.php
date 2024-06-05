<?php
include "layout/header.html";
include "koneksi.php";
include "function.php";

session_start();

if (!isset($_SESSION['terjawab'])) {
    $_SESSION['terjawab'] = [];
    // $_SESSION['current_gejala'] = 1;
    // } else {
    //     $answered_gejala = array_keys($_SESSION['terjawab']);
    //     $current_gejala = $_SESSION['current_gejala'];

    //     $next_gejala = get_next_gejala($db, $current_gejala, $answered_gejala);
    //     if ($next_gejala !== null) {
    //         $_SESSION['current_gejala'] = $next_gejala;
    //     } else {
    //         $_SESSION['diagnosa_selesai'] = true;
    //     }
}

$semuaGejala = get_all_gejala($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa</title>
    <link rel="stylesheet" href="style_index.css" />
</head>

<div class="body">

    <body>
        <div class="container2">
            <?php
            echo '<div class="title">';
            echo '<h2>Pilih Gejala Yang Di Alami </h2>';
            echo '</div>';
            echo "<div class='pesan'>";
            if (isset($_SESSION['error'])) {
                echo '<p>' . $_SESSION['error'] . '</p>';
                unset($_SESSION['error']);
            }
            echo "</div>";
            ?>
        </div>
        <div class="container">
            <form action="proses.php" method="POST">
                <table class="content">
                    <tr>
                        <th>No.</th>
                        <th colspan="2">Gejala
                            <input type="submit" class="btn1" name="submit" value="Kirim">
                        </th>
                    </tr>

                    <?php
                    // if (!isset($_SESSION['terjawab'])) {
                    //     $_SESSION['terjawab'] = [];
                    //     $_SESSION['current_gejala'] = 1;
                    // }

                    // $id_gejala = $_SESSION['current_gejala'];
                    // $row = get_gejala($db, $id_gejala);
                    // if (!isset($_SESSION['diagnosa_selesai']) || !$_SESSION['diagnosa_selesai']) {
                    //     $id_gejala = $_SESSION['current_gejala'];
                    //     $row = get_gejala($db, $id_gejala);
                    //     if ($row) {
                    //         echo "<p><h3>Apakah Anda mengalami</h3> " . htmlspecialchars($row['gejala']) . "?</p>";
                    //         echo '<input type="hidden" name="id_gejala" value="' . htmlspecialchars($id_gejala) . '">';
                    //         echo '<input type="submit" class="btn1" name="answer" value="Ya">';
                    //         echo '<input type="submit" class="btn2" name="answer" value="Tidak">';
                    //     }
                    // } else {
                    //     echo '<p>Diagnosa selesai <a href="result.php">Lihat hasil</a> atau <a href="reset.php">Muat ulang</a></p>';
                    // }
                    // mysqli_close($db);

                    if (!isset($_SESSION['diagnosa_selesai']) || !$_SESSION['diagnosa_selesai']) {
                        // echo "pilih gejala yang sesuai";
                        $no = 1;
                        foreach ($semuaGejala as $gejala) {
                            echo "<tr>";
                            echo "<td align='center'>" . $no . "</td>";
                            echo "<td>" . htmlspecialchars($gejala['gejala']) . "</td>";
                            echo '<td><input type="checkbox" name="gejala[]" value="' . htmlspecialchars($gejala['id_gejala']) . '"></td>';
                            echo "</tr>";
                            $no++;
                        }
                        echo "<tr>";
                        echo "<td></td>";
                        echo '<td colspan="2"><input type="submit" class="btn1" name="submit" value="Kirim"></td>';
                        echo "</tr>";
                    } else {
                        header("location: result.php");
                    }
                    mysqli_close($db);


                    // if ($row) {
                    //     echo "<p><h3>apakah anda mengalami</h3>" . $row['gejala'] . "?</p>";
                    //     echo '<input type="hidden" name="id_gejala" value="' . $id_gejala . '">';
                    //     echo '<input type="submit" class="btn1" name="answer" value="Ya">';
                    //     echo '<input type="submit" class="btn2" name="answer" value="Tidak">';

                    // echo "Isi dari session terjawab:";
                    // var_dump($_SESSION['terjawab']);
                    //     } else {
                    //         echo '<p>diagnosa selesai <a href="result.php">lihat hasil</a> atau <a href="reset.php">muat ulang</a></p>';
                    //     }
                    // }
                    // mysqli_close($db);
                    ?>
                </table>
            </form>


        </div>
    </body>
</div>


</html>