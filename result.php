<?php
include "function.php";
include "koneksi.php";
session_start();


if (!isset($_SESSION['terjawab'])) {
    header("location: index.php");
    exit();
}

$terjawab = $_SESSION['terjawab'];
$cari_penyakit = [];

foreach ($terjawab as $id_gejala => $jawaban) {
    if ($jawaban) {
        // var_dump($jawaban);
        $hasil = get_penyakit_by_gejala($db, $id_gejala);
        // var_dump($hasil);
        foreach ($hasil as $id_penyakit) {
            if (!isset($cari_penyakit[$id_penyakit])) {
                $cari_penyakit[$id_penyakit] = 0;
            }
            $cari_penyakit[$id_penyakit]++;
        }
    }
}
arsort($cari_penyakit);
$hasilnya = key($cari_penyakit);
$get = get_penyakit_name($db, $hasilnya);
$penyakit = $get['penyakit'];
$desc = $get['deskripsi'];
// var_dump($cari_penyakit);
// var_dump($hasilnya);
// $hitung = count()


$data = hitung_persentase($db, $terjawab, $hasilnya);
$penyakit_lain = [];
$result = mysqli_query($db, "SELECT id_penyakit, penyakit FROM penyakit");
while ($row = mysqli_fetch_assoc($result)) {
    $penyakit_lain[$row['id_penyakit']] = $row['penyakit'];
}

$kemungkinan_lain = [];
foreach ($penyakit_lain as $id_penyakit => $nama_penyakit) {
    $kemungkinan_lain[$id_penyakit] = hitung_persentase($db, $terjawab, $id_penyakit);
}


// mysqli_close($db);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="result.css" />
</head>

<div class="body">

    <body>
        <div class="container">
            <form action="index.php" method="POST">
                <table class='content'>
                    <tr>
                        <td><a href="reset.php" class='button'>Back</a></td>
                        <td align="left">
                            <h2>Hasil Diagnosa</h2>
                        </td>
                    </tr>
                    <tr>
                        <td class='border'>Penyakit yang di derita kemungkinan besar</td>
                        <td><?= $penyakit . " = " . $data ?></td>
                    </tr>
                    <tr>
                        <td class='border'>Penjelasan</td>
                        <td><?= $desc ?></td>
                    </tr>
                    <tr>
                        <td class='border'>Gejala yang dipilih</td>
                        <td class='data'>
                            <?php
                            echo "<ol>";
                            foreach ($terjawab as $id_gejala => $jawaban) {
                                if ($jawaban) {
                                    $data = get_gejala($db, $id_gejala);
                                    echo "<li>" . $data['gejala'] . "</li>";
                                }
                            }
                            echo "</ol>";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class='border'>Gejala Pada Penyakit <?= $penyakit ?></td>
                        <td class='data'> <?php
                                            $result = mysqli_query($db, "SELECT id_gejala FROM relasi WHERE id_penyakit = $hasilnya");
                                            $gejala = [];
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $gejala[] = $row['id_gejala'];
                                            }

                                            echo "<ol>";
                                            foreach ($gejala as $id_gejala) {
                                                $result2 = mysqli_query($db, "SELECT gejala FROM gejala WHERE id_gejala = $id_gejala");
                                                if (mysqli_num_rows($result2) > 0) {
                                                    $row = mysqli_fetch_assoc($result2);
                                                    echo "<li>" . $row['gejala'] . "</li>";
                                                }
                                            }
                                            echo "</ol>";
                                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class='border'>Kemungkinan penyakit lain</td>
                        <td class='data'>
                            <?php
                            echo "<ol>";
                            foreach ($kemungkinan_lain as $id_penyakit => $persentase) {
                                echo "<li>" . $penyakit_lain[$id_penyakit] . " : " . number_format($persentase) . "%" . "</li>";
                            }
                            "</ol>";
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </body>
</div>


</html>